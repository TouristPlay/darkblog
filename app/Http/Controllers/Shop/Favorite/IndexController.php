<?php

namespace App\Http\Controllers\Shop\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Shop\FavoriteProduct;
use App\Models\Shop\Product;
use function view;

class IndexController extends Controller
{
    public function __invoke()
    {
        $favoriteProductId = FavoriteProduct::whereUserId(\Auth::id())->get('product_id');
        $products = Product::whereIn('id', $favoriteProductId)->orderByDesc('created_at')->paginate(8);
        return view('shop.favorite.index', compact('products'));
    }
}
