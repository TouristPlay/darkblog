<?php

namespace App\Http\Controllers\Start;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Profile\Balance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function redirect;

class RegisterController extends Controller
{
    public function save(RegisterRequest $request) {

        if (Auth::check()) {
            return redirect(route('profile.index', Auth::getUser()->nickname));
        }

        $validateFields = $request->validated();

        $user = User::create($validateFields);
        // Создаем баланс
        Balance::create([
            'user_id' => $user->id,
        ]);

        if ($user) {
            Auth::login($user, true);
            return redirect(route('profile.index', Auth::getUser()->nickname))->withErrors([
                  'formError' => 'An error occurred while registering'
            ]);
        }
    }

}
