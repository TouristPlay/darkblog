<?php

namespace App\Http\Controllers\Forum\Topic\Author;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use App\Models\Forum\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use function view;

class IndexController extends Controller
{
    public function __invoke($nickname) {
        $user = User::whereNickname($nickname)->first();
        $topics = Topic::orderByDesc('created_at')->whereUserId($user->id)->paginate(5);
        return view('forum.topic.author.index', compact('topics', 'nickname'));
    }
}
