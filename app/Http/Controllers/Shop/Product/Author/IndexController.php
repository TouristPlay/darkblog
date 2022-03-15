<?php

namespace App\Http\Controllers\Shop\Product\Author;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($nickname)
    {

        $userId = User::whereNickname($nickname)->first()->id;
        $products = Product::whereUserId($userId)->paginate(8);

        return view('shop.product.author.index', compact('products', 'nickname'));
    }
}
