<?php

namespace App\Http\Controllers\Start;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;

class LoginController extends Controller
{



    public function login(Request $request) {

        if (Auth::check()) {
            return redirect(route('profile.index', Auth::getUser()->nickname));
        }

        $formField = $request->only(['email', 'password']);

        if (Auth::attempt($formField)) {
            return redirect(route('profile.index', Auth::getUser()->nickname));
        }

        return redirect(route('login'))->withErrors([
            'email' => 'failed to login'
        ]);
    }
}
