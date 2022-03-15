<?php

namespace App\Http\Controllers\Shop\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Shop\FavoriteProduct;
use App\Models\Shop\Product;
use function redirect;

class CreateController extends Controller
{
    public function __invoke(Product $product)
    {
        FavoriteProduct::firstOrCreate([
            'product_id' => $product->id,
            'user_id' => \Auth::id(),
            ]);

        $product->increment('favorite_counter');

        return redirect(\URL::previous());
    }
}
