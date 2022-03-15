<?php

namespace App\Http\Controllers\Blog\MyBlog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use function view;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('blog.myblog.create', compact('categories'));
    }
}
