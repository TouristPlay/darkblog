<?php

namespace App\Http\Controllers\Blog\Deleted;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use function view;

class ShowController extends Controller
{
    public function __invoke(Post $post) {
        return view('blog.deleted.show', compact('post'));
    }
}
