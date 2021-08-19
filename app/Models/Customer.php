<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

protected $fillable = ['name', 'phone', 'address'];
protected $casts =[
    'phone'=>'array'
];



public function orders(): HasMany
{
    return $this->hasMany(Order::class,'customer_id');
}
}
