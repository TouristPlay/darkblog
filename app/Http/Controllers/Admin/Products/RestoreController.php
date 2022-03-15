<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->restore();
        return redirect(route('admin.products.index'));
    }
}
