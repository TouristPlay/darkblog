<?php

namespace App\Http\Controllers\Shop\Card;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Order::whereUserId(\Auth::id())->whereStatus('card')->get();
        return view('shop.card.index', compact('products'));
    }
}
