<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Order::whereUserId(\Auth::id())->where('status', '<>', 'card')->get();
        return view('shop.order.index', compact('products'));
    }
}
