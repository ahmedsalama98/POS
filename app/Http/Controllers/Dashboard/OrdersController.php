<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:orders-read'])->only(['index','show']);
        $this->middleware(['permission:orders-create'])->only(['create', 'store']);
        $this->middleware(['permission:orders-update'])->only(['update', 'edit']);
        $this->middleware(['permission:orders-delete'])->only(['destroy']);
    }
    protected $path ='dashboard.orders.';
    public function index(Request $request)
    {

        $orders = Order::whereHas('customer' ,function($q) use($request){
            $q->when($request->search, function($query)use($request){

                $query->where('name' , 'like' , '%'.$request->search.'%');
            });
        })
        ->with('products', 'customer')->latest()->paginate(5);


        return view($this->path. 'index' ,compact('orders'));
    }


    public function create(Customer $customer )
    {

        $categories = Category::with('products')->get();

        return view($this->path. 'create' ,compact('customer' ,'categories'));
    }


    public function store(Request $request , Customer $customer )
    {



        $this->validate($request, [

            'products'=>'required|array',
        ]);

        $order = new Order();
        $order->customer_id = $customer->id;

        $order->save();

        $order->products()->attach($request->products);

        $total_price =0;
        foreach($request->products as $id=> $quantity){

            $product = Product::findOrFail($id);
            $quantity =$quantity['quantity'];
            $total_price += $quantity * $product->sale_price;
            $product->stock =$product->stock -$quantity;

            if($product->stock < 1){
                $product->status =0;

            }
            $product->save();
            // $order->products()->attach($product , ['quantity'=>$quantity]);
        }

        $order->total_price =$total_price;
        $order->save();

        return redirect()->route('dashboard.orders.index')->with('success', trans('site.added_successfully'));
    }



    public function edit($id)

    {
        $categories = Category::with('products')->get();

        $order = Order::with('products')->findOrFail($id);

        return view($this->path. 'edit' ,compact('order' ,'categories'));


    }


    public function update(Request $request,Order $order)
    {


    $this->validate($request, [

        'products'=>'required|array',
    ]);



    $order->products()->sync($request->products);

    $total_price =0;
    foreach($request->products as $id=> $quantity){

        $product = Product::findOrFail($id);
        $quantity =$quantity['quantity'];
        $total_price += $quantity * $product->sale_price;
        $product->stock =$product->stock -$quantity;

        if($product->stock < 1){
            $product->status =0;

        }
        $product->save();
        // $order->products()->attach($product , ['quantity'=>$quantity]);
    }

    $order->total_price =$total_price;
    $order->save();

    return redirect()->route('dashboard.orders.index')->with('success', trans('site.updated_successfully'));

    }


    public function destroy(Order $order)
    {

        $order->delete();
        return redirect()->back()->with('success', trans('site.deleted_successfully'));

    }

    public function show($id){


        $order = Order::with('products')->findOrFail($id);


        $view = view($this->path . '_show', compact('order'))->render();

        return response()->json(['data'=>$view], 200);

    }
}
