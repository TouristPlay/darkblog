<?php

namespace App\Http\Controllers\Shop\MyCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ProductRequest;
use App\Models\Shop\Product;
use App\Models\Shop\ProductCategory;

class StoreController extends Controller
{
    public function __invoke(ProductRequest $request)
    {

        $data = $request->validated();
        // Если файл загружен
        if (isset($data['file'])) {
            $path = $request->file('file')->store('product');
            $data['file'] = $path;
        }

        $data['user_id'] = \Auth::id();

        // Увеличиваем счетчик постов с данной категорией
        ProductCategory::whereId($data['category_id'])->increment('product_counter');

        Product::create($data);
        return redirect(route('shop.mycard.index'));
    }
}
