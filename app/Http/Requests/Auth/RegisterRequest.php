<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|confirmed',
            'name' => 'string|required|max:50',
            'nickname' => 'string|required|max:50|unique:users,nickname',
            'lastname' => 'string|required|max:50'
        ];
    }
}
