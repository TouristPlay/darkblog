<?php

namespace App\Http\Controllers\Shop\MyCard;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $categories = ProductCategory::all();

        if ($product->user_id != \Auth::id()) {
            return redirect(\URL::previous());
        }


        return view('shop.mycard.edit', compact('product', 'categories'));
    }
}
