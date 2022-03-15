<?php

namespace App\Http\Controllers\Shop\MyCard;

use App\Http\Controllers\Controller;
use App\Models\Shop\ProductCategory;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = ProductCategory::all();
        return view('shop.mycard.create', compact('categories'));
    }
}
