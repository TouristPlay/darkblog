<?php

namespace App\Http\Controllers\Shop\Seller;

use App\Http\Controllers\Controller;
use App\Models\Profile\Balance;
use App\Models\Shop\Order;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Order $order, Request $request)
    {

        $statusArray = [
            "On confirmation",
            "Order is accepted",
            "Order collected",
            "Order sent",
            "Order arrived",
            "Completed"
        ];

        // Если был отправлене статус которого нет в списке
        if (!array_search($request->status, $statusArray)) {
            return redirect(route('shop.seller.index'));
        }

        // Если заказ завершен начисляем баланс продавцу
        if ($request->status == "Completed") {
            // Начисляем баланс продавцу
            $salesmanBalance = Balance::whereUserId($order->seller_id)->first();
            $salesmanBalance->update(['balance' => $salesmanBalance->balance + $order->total_price]);
        }

        // Обновляем статус
        if (\Auth::id() == $order->seller_id) {
            $order->update([
                'status' => $request->status,
            ]);
        }

        return redirect(route('shop.seller.index'));
    }
}
