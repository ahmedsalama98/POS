<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $fillable=['ar_name','en_name'];
    protected $hidden =['ar_name','en_name'];



    protected $appends =['name' , 'products_count'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest();
    }

    public function getNameAttribute(){

        $name = app()->getLocale().'_name';
        return  $this->$name;
    }

    public function getProductsCountAttribute(){


       return  $this->products()->count();
    }


}


