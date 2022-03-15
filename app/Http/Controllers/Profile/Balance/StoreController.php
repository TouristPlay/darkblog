<?php

namespace App\Http\Controllers\Profile\Balance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\BalanceRequest;
use App\Models\Profile\Balance;

class StoreController extends Controller
{
    public function __invoke(BalanceRequest $request)
    {
        // Получаем текущий баланс
        $balance = Balance::whereUserId(\Auth::id())->first();

        $data = $request->validated();
        $data['balance'] += $balance->balance;

        $balance->update($data);

        return redirect(\URL::previous());
    }
}
