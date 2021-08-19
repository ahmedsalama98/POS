<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{

    protected $path ='dashboard.users.';


    public function __construct()
    {
        $this->middleware(['permission:users-read'])->only('index');
        $this->middleware(['permission:users-create'])->only(['create', 'store']);
        $this->middleware(['permission:users-update'])->only(['update', 'edit']);
        $this->middleware(['permission:users-delete'])->only(['destroy']);
    }
    public function index(Request $request)
    {


        $users = User::whereRoleIs(['admin'])->where(function($q) use($request){
            $q->when($request->search , function($query) use ($request){
                $query->where('first_name' , 'like' , '%'.$request->search.'%')
                      ->orWhere('last_name' , 'like' , '%'.$request->search.'%')
                      ->orWhere('email' , 'like' , '%'.$request->search.'%');
            });
        })
        ->latest()->paginate(5);


        return view($this->path. 'index', compact('users'));
    }


    public function create()
    {
        return view($this->path. 'create');
    }


    public function store(Request $request)


    {



        $validator = $this->validate($request ,[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|string',
            'password_confirmation'=>'required|string|same:password',
            'permissions'=>'required'
        ]
        );


        $user =new User();

        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        $user->save();

        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        if($request->hasFile('image')){

            $request->validate( [
                'image'=>'image|max:2200'
            ]);

            $oldImg = $request->file('image');
            $newImg =$oldImg->hashName();
            Image::make($oldImg)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/users_img_uploads/' .$newImg );
            $user->image=$newImg;
            $user->save();
        }


        return redirect()->route('dashboard.users.index')->with('success', trans('site.added_successfully'));

    }




    public function edit($id)

    {

        $user = User::findOrFail($id);
        return view($this->path. 'edit' , compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request ,[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>[
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]
        );

        if($request->hasFile('image')){

            $request->validate( [
                'image'=>'image|max:2200'
            ]);

            $img =$user->image;
                    if( $img != 'default.png'){
                        Storage::disk('public_uploads')->delete('users_img_uploads/' . $img);
                    }
            $oldImg = $request->file('image');
            $newImg =$oldImg->hashName();
            Image::make($oldImg)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/users_img_uploads/' .$newImg );
            $user->image=$newImg;








        }

        $permissions = $request->permissions?$request->permissions:[];


        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->syncPermissions($permissions);
        $user->save();

        if($request->input('password')){
            $this->validate($request ,[
                'password'=>'required|string',
                'password_confirmation'=>'required|string|same:password',
            ]
            );

            $user->password=Hash::make($request->password);
            $user->save();
        }



        return redirect()->route('dashboard.users.index')->with('success', trans('site.updated_successfully'));
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $img =$user->image;
        if( $img != 'default.png'){
            Storage::disk('public_uploads')->delete('users_img_uploads/' . $img);
        }
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success', trans('site.deleted_successfully'));


    }
}
