<?php

namespace App\Http\Controllers\Blog\Draft;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $posts = Post::where('user_id', \Auth::id())
            ->where('published', false)
            ->paginate(3);

        return view('blog.draft.index', compact('posts'));
    }
}
