<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\OrderRequest;
use App\Models\Profile\Balance;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(OrderRequest $request)
    {

        // Все товары пользователя добавленные в корзину
        $productsCard = Order::whereUserId(\Auth::id())->whereStatus('card')->get();

        // Добавляем товары в заказы
        foreach ($productsCard as $productCard) {
            $productCard->update([
                'status' => 'On confirmation',
                'address' => $request->address
            ]);
            $product =  Product::find($productCard->product_id);
            $product->update([
                'amount' => ($product->amount - $productCard->amount),
            ]);
        }

        // Списываем баланс у покупателя
        $price = $productsCard->sum('total_price');
        $buyerBalance = Balance::whereUserId(\Auth::id())->first();
        $buyerBalance->update(['balance' => $buyerBalance->balance - $price]);


        return redirect(route('shop.card.index'));
    }
}
