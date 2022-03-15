<?php

namespace App\Http\Controllers\Admin\BlogCategory;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $categories = Category::withTrashed()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
}
