<?php

namespace App\Http\Controllers\Shop\MyCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ProductRequest;
use App\Models\Shop\Product;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Product $product, ProductRequest $productRequest)
    {

        // Меняем количество продуктов в категории
        ProductCategory::whereId($product->category_id)->first()->decrement('product_counter');

        $data = $productRequest->validated();

        // Увеличиваем счетчик новой категории
        ProductCategory::whereId($data['category_id'])->first()->increment('product_counter');

        // Если файл загружен
        if (isset($data['file'])) {
            Storage::delete($product->file); // Удаляем старый
            $path = $productRequest->file('file')->store('product');
            $data['file'] = $path;
        }

        $product->update($data);


        return redirect(route('shop.mycard.index'));
    }
}
