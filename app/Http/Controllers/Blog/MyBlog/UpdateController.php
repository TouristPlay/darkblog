<?php

namespace App\Http\Controllers\Blog\MyBlog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\MyBlog\PostRequest;
use App\Models\Blog\Post;

class UpdateController extends Controller
{
    public function __invoke(PostRequest $request, $post_id) {
        $field = $request->validated();
        Post::withTrashed()->find($post_id)->update($field);
        return redirect(route('blog.myblog.index'));
    }
}
