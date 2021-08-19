<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    protected $path ='dashboard.products.';



    public function __construct(){

        $this->middleware(['permission:products-read'])->only('index');
        $this->middleware(['permission:products-create'])->only(['create', 'store']);
        $this->middleware(['permission:products-update'])->only(['update', 'edit']);
        $this->middleware(['permission:products-delete'])->only(['destroy']);
    }
    public function index(Request $request)
    {





        $products = Product::
        when($request->search, function($query)use($request){
            $query->where('en_name' ,'like','%'.$request->search.'%' )
            ->orWhere('ar_name' ,'like','%'.$request->search.'%')
            ->orWhere('ar_description' ,'like','%'.$request->search.'%')
            ->orWhere('en_description' ,'like','%'.$request->search.'%');
        })
        ->when($request->category_id, function($query)use($request){
            $query->where('category_id' ,$request->category_id);
        })

        ->latest()->paginate(5);

        $categories = Category::all();




        return view($this->path. 'index' , compact('products' ,'categories'));
    }


    public function create()

    {
        $categories = Category::all();

        return view($this->path. 'create' , compact('categories'));
    }


    public function store(Request $request)
    {

        // return $request->all();

        // return $request->ar['name'];

        // $name =[];
        // $description =[];


        $rules = [
            'purchese_price'=>'required|integer|min:1',
            'sale_price'=>'required|integer|min:1',
            'stock'=>'required|integer|min:1',
            'category_id'=>'required|integer|min:1',
            '*_name'=>'required|string',
            '*_description'=>'required|string',
        ];


        foreach(config('translatable.locales') as $locale){
            $rules+=[

                $locale.  '.name' =>'required|string',
                $locale.  '.description' =>'required|string',
            ];
            // $name +=[
            //     $locale =>$request->$locale['name']
            // ];
            // $description +=[
            //     $locale =>$request->$locale['description']
            // ];
        }





        Validator::make($request->all(), $rules, )->validate();

       $product = new Product();
        $product->ar_name = $request->ar['name'];
        $product->en_name = $request->en['name'];
        $product->en_description = $request->en['description'];
        $product->ar_description = $request->ar['description'];

        $product ->purchese_price=$request->purchese_price;
        $product ->sale_price=$request->sale_price;
        $product ->stock=$request->stock;
        $product ->category_id=$request->category_id;
        if($request->hasFile('image')){

            $request->validate([
                'image'=>'image'
            ]);

            $oldImage = $request->file('image');
            $newImage = $oldImage->hashName();

            Image::make($oldImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/products_images/' .$newImage ,100);
        $product->image = $newImage;

        }
        $product->save();


        return redirect()->route('dashboard.products.index')->with('success', trans('site.added_successfully'));

    }



    public function edit($id)
    {

        $product =Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view($this->path. 'edit' ,compact('categories' , 'product' ));
    }


    public function update(Request $request, $id)
    {
        $product =Product::findOrFail($id);


        $name =[];
        $description =[];


        $rules = [
            'purchese_price'=>'required|integer|min:1',
            'sale_price'=>'required|integer|min:1',
            'stock'=>'required|integer|min:1',
            'category_id'=>'required|integer|min:1',
            '*_name'=>'required|string',
            '*_description'=>'required|string',
        ];


        foreach(config('translatable.locales') as $locale){
            $rules+=[

                $locale.  '.name' =>'required|string',
                $locale.  '.description' =>'required|string',
            ];
            // $name +=[
            //     $locale =>$request->$locale['name']
            // ];
            // $description +=[
            //     $locale =>$request->$locale['description']
            // ];
        }


        Validator::make($request->all(), $rules, )->validate();

        $product->ar_name = $request->ar['name'];
        $product->en_name = $request->en['name'];
        $product->en_description = $request->en['description'];
        $product->ar_description = $request->ar['description'];

        $product ->purchese_price=$request->purchese_price;
        $product ->sale_price=$request->sale_price;
        $product ->stock=$request->stock;
        $product ->category_id=$request->category_id;
        if($request->hasFile('image')){

            $request->validate([
                'image'=>'image'
            ]);

            $oldImage = $request->file('image');
            $newImage = $oldImage->hashName();

            Image::make($oldImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/products_images/' .$newImage ,100);

            if($product->image != 'default.png'){
                Storage::disk('public_uploads')->delete('products_images/'. $product->image);
            }
        $product->image = $newImage;

        }
        $product->save();


        return redirect()->route('dashboard.products.index')->with('success', trans('site.updated_successfully'));


    }


    public function destroy($id)
    {
        $product =Product::findOrFail($id);
        if($product->image != 'default.png'){
            Storage::disk('public_uploads')->delete('products_images/'. $product->image);
        }
        $product->delete();
        return redirect()->back()->with('success', trans('site.deleted_successfully'));


    }
}
