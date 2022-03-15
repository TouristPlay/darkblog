<?php

namespace App\Http\Controllers\Admin\ShopCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Category\CategoryRequest;
use App\Http\Requests\Shop\ProductCategoryRequest;
use App\Models\Blog\Category;
use App\Models\Shop\ProductCategory;


class UpdateController extends Controller
{
    public function __invoke(ProductCategory $ProductCategory, ProductCategoryRequest $request)
    {
        $data = $request->validated();
        $ProductCategory->update($data);

        return redirect(route('admin.shop-category.index'));
    }
}
