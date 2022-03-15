<?php

namespace App\Http\Controllers\Blog\MyBlog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use function view;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::where('user_id', \Auth::id())
            ->where('published', true)
            ->orderByDesc('created_at')
            ->paginate(3);

        return view('blog.myblog.index', compact('posts'));
    }
}
