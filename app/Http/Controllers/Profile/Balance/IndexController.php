<?php

namespace App\Http\Controllers\Profile\Balance;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($nickname)
    {

        $user = User::where('nickname', $nickname)->first();

        return view('profile.balance.index', compact('user', 'nickname'));
    }
}
