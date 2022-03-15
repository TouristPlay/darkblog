<?php

namespace App\Http\Controllers\Admin\ShopCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ProductCategoryRequest;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(ProductCategoryRequest $request)
    {
        $data = $request->validated();
        ProductCategory::firstOrCreate($data);
        return redirect(route('admin.shop-category.index'));
    }
}
