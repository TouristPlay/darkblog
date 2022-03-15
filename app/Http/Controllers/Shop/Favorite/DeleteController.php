<?php

namespace App\Http\Controllers\Shop\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Shop\FavoriteProduct;
use App\Models\Shop\Product;
use function redirect;

class DeleteController extends Controller
{
    public function __invoke($product_id)
    {
        FavoriteProduct::whereProductId($product_id)->delete();

        $product = Product::whereId($product_id)->first();
        $product->decrement('favorite_counter');

        return redirect(\URL::previous());
    }
}
