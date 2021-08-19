<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CatergoriesController extends Controller
{

    protected $path ='dashboard.categories.';

    public function __construct()
    {
        $this->middleware(['permission:categories-read'])->only('index');
        $this->middleware(['permission:categories-create'])->only(['create', 'store']);
        $this->middleware(['permission:categories-update'])->only(['update', 'edit']);
        $this->middleware(['permission:categories-delete'])->only(['destroy']);
    }
    public function index(Request $request)
    {

        $name =app()->currentLocale(). '_name';
        $categories = Category::when($request->search, function($query) use ($request){
            $query->where('ar_name' , 'like','%'. $request->search .'%')
           -> orWhere('en_name' , 'like', '%'. $request->search .'%');
        })
        ->latest()->paginate(5);
        return view($this->path. 'index', compact('categories'));
    }


    public function create()
    {
        return view($this->path. 'create');
    }


    public function store(Request $request)
    {



        $request->validate([
        'ar_name'=>'required|string|unique:categories',
        'en_name'=>'required|string|unique:categories',
       ]);



        $category = new Category();
        $category->ar_name = $request->ar_name;
        $category->en_name = $request->en_name;
        $category->save();


        return redirect()->route('dashboard.categories.index')->with('success', trans('site.added_successfully'));
    }





    public function edit($id)

    {


        $category = Category::findOrFail($id);
        return view($this->path. 'edit' , compact('category'));
    }


    public function update(Request $request, $id)
    {


        $category = Category::findOrFail($id);

        $request->validate([
            'ar_name'=>['required',
            'string',
            Rule::unique('categories')->ignore($category->id)
            ],
            'en_name'=>['required',
            'string',
            Rule::unique('categories')->ignore($category->id)
            ],
           ]);


            $category->ar_name = $request->ar_name;
            $category->en_name = $request->en_name;
            $category->save();


            return redirect()->route('dashboard.categories.index')->with('success', trans('site.updated_successfully'));
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success', trans('site.deleted_successfully'));


    }
}
