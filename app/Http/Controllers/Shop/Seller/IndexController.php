<?php

namespace App\Http\Controllers\Shop\Seller;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {

        $products = Order::whereSellerId(\Auth::id())->where('status', '<>', 'card')->get();

        return view('shop.seller.index', compact('products'));
    }
}
