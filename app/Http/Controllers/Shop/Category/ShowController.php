<?php

namespace App\Http\Controllers\Shop\Category;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($categoryId)
    {
        $category = ProductCategory::whereId($categoryId)->first();
        $products = Product::whereCategoryId($categoryId)->paginate(8);
        return view('shop.category.show', compact('products', 'category'));
    }
}
