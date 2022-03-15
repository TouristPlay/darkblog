<?php

namespace App\Http\Controllers\Blog\Draft;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class UpdateController extends Controller
{
    public function __invoke($post_id) {
        Post::find($post_id)->update(['published' => true]);
        return redirect(route('blog.myblog.index'));
    }
}
