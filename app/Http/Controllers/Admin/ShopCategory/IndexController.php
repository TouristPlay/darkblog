<?php

namespace App\Http\Controllers\Admin\ShopCategory;

use App\Http\Controllers\Controller;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = ProductCategory::withTrashed()->paginate(5);
        return view('admin.shopCategory.index', compact('categories'));
    }
}
