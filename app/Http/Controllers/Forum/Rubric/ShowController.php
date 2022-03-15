<?php

namespace App\Http\Controllers\Forum\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use App\Models\Forum\Topic;
use Illuminate\Support\Facades\Request;
use function view;

class ShowController extends Controller
{
    public function __invoke(Rubric $rubric) {

        $topics = Topic::whereRubricId($rubric->id)->paginate(5);

        return view('forum.rubric.show', compact('topics', 'rubric'));
    }
}
