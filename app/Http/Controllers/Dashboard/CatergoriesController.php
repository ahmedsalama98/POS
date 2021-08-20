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

        $categories = Category::whereNull('parent_id')->when($request->search, function($query) use ($request){
            $query
            ->where('ar_name' , 'like','%'. $request->search .'%')
        -> orWhere('en_name' , 'like', '%'. $request->search .'%')
        ->whereNull('parent_id');
        })
        ->with('sub_categories')
        ->latest()->paginate(5);


        return view($this->path. 'index', compact('categories'));
    }


    public function create()
    {

        $categories= Category::whereNull('parent_id')->get();

        return view($this->path. 'create' , compact('categories'));
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
        if($request->input('parent_id')){
            $category->parent_id = $request->parent_id;
        }
        $category->save();


        return redirect()->route('dashboard.categories.index')->with('success', trans('site.added_successfully'));
    }





    public function edit($id)

    {
        $category = Category::findOrFail($id);
        $categories= Category::whereNull('parent_id')->get();

        return view($this->path. 'edit' , compact('category','categories'));
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
            $category->parent_id = $request->parent_id;

            $category->save();


            return redirect()->route('dashboard.categories.index')->with('success', trans('site.updated_successfully'));
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success', trans('site.deleted_successfully'));
    }


    public function subCategories( Request $request, $parent_id){


        $parent_category =Category::whereNull('parent_id')->findOrFail($parent_id);
        $categories = Category::whereNotNull('parent_id')
        ->where('parent_id' , $parent_id)
        ->when($request->search, function($query) use ($request , $parent_id){
            $query
                  ->where('ar_name' , 'like','%'. $request->search .'%')
                  -> orWhere('en_name' , 'like', '%'. $request->search .'%')
                  ->where('parent_id' , $parent_id)
                  ->whereNotNull('parent_id');
        })

        ->latest()->paginate(5);


        return view($this->path. 'sub_categories', compact('categories','parent_category'));

    }
}
