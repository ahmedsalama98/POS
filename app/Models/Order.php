<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $filable =['customer_id' , 'total_price'];


    protected $appends =['items_names'];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }





    public function getItemsNamesAttribute(){

        $items = '';

        foreach($this->products as $product){
            $items .=' ( '. $product ->pivot->quantity. ' ) '. $product->name . ' , ';
        }

        return rtrim($items ,' , ');
    }



    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_order')->withPivot('quantity');
    }

}
