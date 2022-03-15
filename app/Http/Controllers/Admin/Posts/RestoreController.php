<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class RestoreController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->restore();
        return redirect(route('admin.posts.index'));
    }
}
