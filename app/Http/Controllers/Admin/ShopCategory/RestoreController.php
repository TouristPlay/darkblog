<?php

namespace App\Http\Controllers\Admin\ShopCategory;

use App\Http\Controllers\Controller;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(ProductCategory $ProductCategory)
    {
        $ProductCategory->restore();

       return redirect(route('admin.shop-category.index'));
    }
}
