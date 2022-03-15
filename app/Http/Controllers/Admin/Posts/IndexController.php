<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::withTrashed()->paginate(8);
        return view('admin.posts.index', compact('posts'));
    }
}
