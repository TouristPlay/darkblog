<?php

namespace App\Http\Controllers\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use function view;

class ShowController extends Controller
{
    public function __invoke(Category $category) {
        $posts = Post::where('category_id', $category->id)
            ->paginate(3);

        return view('blog.category.show', compact('posts', 'category'));
    }
}
