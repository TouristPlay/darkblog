<?php

namespace App\Http\Controllers\Forum\Topic;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use App\Models\Forum\Topic;
use Illuminate\Support\Facades\Request;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $topics = Topic::orderByDesc('created_at')->paginate(5);
        return view('forum.topic.index', compact('topics'));
    }
}
