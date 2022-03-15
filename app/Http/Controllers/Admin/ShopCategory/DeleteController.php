<?php

namespace App\Http\Controllers\Admin\ShopCategory;

use App\Http\Controllers\Controller;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(ProductCategory $ProductCategory)
    {
        $ProductCategory->delete();
        return redirect(route('admin.shop-category.index'));
    }
}
