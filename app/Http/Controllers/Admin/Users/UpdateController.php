<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $user_id) {

        $validate = $request->validate([
            'role' => 'string',
        ]);

        User::find($user_id)->update($validate);

        return redirect(\URL::previous());
    }
}
