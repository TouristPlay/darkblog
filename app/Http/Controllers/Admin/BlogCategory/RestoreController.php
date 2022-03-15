<?php

namespace App\Http\Controllers\Admin\BlogCategory;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(Category $category)
    {
        $category->restore();
        return redirect(route('admin.categories.index'));
    }
}
