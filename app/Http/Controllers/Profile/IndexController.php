<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use function view;

class IndexController extends Controller
{
    public function __invoke($nickname) {
        $user = User::where('nickname', $nickname)->first();
        return view('profile.index', compact('user', 'nickname'));
    }
}
