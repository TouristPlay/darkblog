<?php

namespace App\Http\Controllers\Shop\Card;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Product $product)
    {

        if ($product->user_id == \Auth::id()) {
            return redirect(\URL::previous());
        }

        $data['user_id'] = \Auth::id();
        $data['product_id'] = $product->id;
        $data['seller_id'] = $product->user_id;
        $data['total_price'] = $product->price * (1 - $product->discount/100);
        $data['status'] = 'card';

        Order::firstOrCreate($data);

        return redirect(\URL::previous());
    }
}
