<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|string|max:40',
            'content' => 'required|string|min:100',
            'category_id' => 'required|exists:product_categories,id',
            'file' => 'dimensions:min_width=720,min_height=400',
            'amount' => 'required|numeric|between: 0, 9999',
            'price' => 'required|numeric|between: 1, 99999999999',
            'discount' => 'numeric|between: 0, 100',
        ];
    }
}
