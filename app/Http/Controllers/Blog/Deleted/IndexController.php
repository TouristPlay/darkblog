<?php

namespace App\Http\Controllers\Blog\Deleted;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $posts = Post::onlyTrashed()
            ->where('user_id', \Auth::id())
            ->paginate(3);

        return view('blog.deleted.index', compact('posts'));
    }
}
