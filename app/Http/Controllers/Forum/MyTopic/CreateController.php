<?php

namespace App\Http\Controllers\Forum\MyTopic;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use App\Models\Forum\Topic;
use Illuminate\Support\Facades\Request;
use function view;

class CreateController extends Controller
{
    public function __invoke() {
        $rubrics = Rubric::all();
        return view('forum.mytopic.create', compact('rubrics'));
    }
}
