<?php

namespace App\Http\Controllers\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        return view('shop.product.show', compact('product'));
    }
}
