<?php

namespace App\Http\Controllers\Shop\MyCard;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::whereUserId(\Auth::id())->orderByDesc('created_at')->paginate(8);
        return view('shop.mycard.index', compact('products'));
    }
}
