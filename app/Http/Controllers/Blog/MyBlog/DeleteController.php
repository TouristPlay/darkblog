<?php

namespace App\Http\Controllers\Blog\MyBlog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        if ($post->user_id != \Auth::id()) {
            return redirect(route('blog.myblog.index'));
        }

        $post->delete();

        return redirect(route('blog.myblog.index'));
    }
}
