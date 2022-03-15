<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
      'user_id',
      'product_id',
      'amount',
      'total_price',
      'status',
      'address',
      'seller_id'
    ];

}
