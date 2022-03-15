<?php

namespace App\Http\Controllers\Blog\Posts;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use function view;

class ShowController extends Controller
{
    public function __invoke(Post $post) {
        return view('blog.posts.show', compact('post'));
    }
}
