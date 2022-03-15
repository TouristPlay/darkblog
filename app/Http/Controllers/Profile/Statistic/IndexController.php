<?php

namespace App\Http\Controllers\Profile\Statistic;

use App\Http\Controllers\Controller;
use App\Models\User;
use function view;

class IndexController extends Controller
{
    public function __invoke($nickname) {
        $user = User::where('nickname', $nickname)->first();
        return view('profile.statistic.index', compact('user', 'nickname'));
    }
}
