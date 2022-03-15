<?php

namespace App\Http\Controllers\Blog\Posts;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $posts = Post::where('published', true)->orderByDesc('created_at')->paginate(3);
        return view('blog.posts.index', compact('posts'));
    }
}
