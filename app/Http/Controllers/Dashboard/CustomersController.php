<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    protected $path ='dashboard.customers.';
    public function __construct()
    {
        $this->middleware(['permission:customers-read'])->only('index');
        $this->middleware(['permission:customers-create'])->only(['create', 'store']);
        $this->middleware(['permission:customers-update'])->only(['update', 'edit']);
        $this->middleware(['permission:customers-delete'])->only(['destroy']);
    }
    public function index(Request $request)
    {
 

        $customers =Customer ::when($request->search, function($q)use($request){

            return $q->where('name' , 'like' ,'%'.$request->search.'%')
            ->orWhere('phone' , 'like' ,'%'.$request->search.'%')
            ->orWhere('address' , 'like' ,'%'.$request->search.'%');

        })
        ->latest()->paginate(5);

        return view($this->path. 'index' ,compact('customers'));
    }


    public function create()
    {
        return view($this->path. 'create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required|string|min:2',
            'address'=>'required|string|min:2',
            'phone'=>'required|array',
            'phone.0'=>'required',
        ]);

        $customer = new Customer();
        $customer->name =$request->name;
        $customer->address =$request->address;
        $customer->phone =array_filter($request->phone);
        $customer->save();


        return redirect()->route('dashboard.customers.index')->with('success', trans('site.added_successfully'));

    }





    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view($this->path. 'edit',compact('customer'));
    }


    public function update(Request $request, $id)

    {
        $customer = Customer::findOrFail($id);

        $request->validate([

            'name'=>'required|string|min:2',
            'address'=>'required|string|min:2',
            'phone'=>'required|array',
            'phone.0'=>'required',
        ]);

        $customer->name =$request->name;
        $customer->address =$request->address;
        $customer->phone =array_filter($request->phone);
        $customer->save();


        return redirect()->route('dashboard.customers.index')->with('success', trans('site.updated_successfully'));


    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('dashboard.customers.index')->with('success', trans('site.deleted_successfully'));


    }
}
