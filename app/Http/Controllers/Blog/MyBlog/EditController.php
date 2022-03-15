<?php

namespace App\Http\Controllers\Blog\MyBlog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use function view;

class EditController extends Controller
{
    public function __invoke($post_id)
    {
        $post = Post::withTrashed()->find($post_id);

        if ($post->user_id != \Auth::id()) {
            return  redirect(route('blog.myblog.index'));
        }

        $categories = Category::all();
        return view('blog.myblog.edit', compact('post', 'categories'));
    }
}
