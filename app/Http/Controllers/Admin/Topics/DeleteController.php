<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Models\Forum\Topic;

class DeleteController extends Controller
{
    public function __invoke(Topic $topic)
    {
        $topic->delete();
        return redirect(route('admin.topics.index'));
    }
}
