<?php

namespace App\Http\Controllers\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use function view;

class IndexController extends Controller
{

    public function __invoke()
    {
        $categories = Category::all();
        return view('blog.category.index', compact('categories'));
    }
}
