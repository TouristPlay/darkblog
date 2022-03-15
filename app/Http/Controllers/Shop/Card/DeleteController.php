<?php

namespace App\Http\Controllers\Shop\Card;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Order $order)
    {
        $order->delete();
        return redirect(route('shop.card.index'));
    }
}
