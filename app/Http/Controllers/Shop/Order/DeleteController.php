<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Profile\Balance;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Order $order)
    {
        // Возвращаем деньги покупателю
        $buyerBalance = Balance::whereUserId(\Auth::id())->first();
        $buyerBalance->update(['balance' => $buyerBalance->balance + $order->total_price]);

        // Удаляем товар
        $order->delete();

        // Обновляем количество товара
        $product = Product::find($order->product_id);
        $product->update([
            'amount' => $order->amount + $product->amount
        ]);

        return redirect(route('shop.order.index'));
    }
}
