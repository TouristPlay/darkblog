<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {

        $post->delete();

        return redirect(route('admin.posts.index'));
    }
}
