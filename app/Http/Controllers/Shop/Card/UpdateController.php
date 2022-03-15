<?php

namespace App\Http\Controllers\Shop\Card;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Order $order, Request $request)
    {

        if ($request->amount == null) {
            return redirect(route('shop.card.index'));
        }

        $product = Product::whereId($order->product_id)->first();
        $productPrice = $product->price;
        $productDiscount = $product->discount;

        $data['amount'] = $request->amount;
        $data['total_price'] = $productPrice * $request->amount * (1 - ($productDiscount / 100));

        $order->update($data);

        return redirect(route('shop.card.index'));
    }
}
