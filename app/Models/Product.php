<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    // use HasTranslations;

    // public $translatable = ['name' , 'description'];

    protected $fillable =['category_id','ar_name', 'en_name','ar_description', 'en_description','purchese_price',
    'sale_price','stock'];

    protected $appends =['image_path' , 'profit_percent' , 'name' , 'description' , 'category_name'];

    protected $hidden =['ar_name','en_name' ,'ar_description','en_description'];


    public function getImagePathAttribute(){

        return asset('uploads/products_images/'.$this->image);
    }

    public function getProfitPercentAttribute(){

        $profit = $this->sale_price - $this->purchese_price;
        $profit_percent = $profit *100 /$this->purchese_price;

        return number_format($profit_percent ,2);
    }
    public function getNameAttribute(){

        $name = app()->getLocale().'_name';
        return  $this->$name;
    }

    public function getDescriptionAttribute(){

        $description = app()->getLocale().'_description';
        return  $this->$description;
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function getCategoryNameAttribute(){

        $name = app()->getLocale().'_name';
        $cat_name=  $this->category()->first($name);

        return $cat_name->name;
    }


    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }


}
