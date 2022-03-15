<?php

namespace App\Http\Controllers\Forum\Rubric;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use Illuminate\Support\Facades\Request;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $rubrics = Rubric::all();
        return view('forum.rubric.index', compact('rubrics'));
    }
}
