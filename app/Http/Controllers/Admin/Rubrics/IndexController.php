<?php

namespace App\Http\Controllers\Admin\Rubrics;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use Illuminate\Support\Facades\Request;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $rubrics = Rubric::withTrashed()->paginate(5);
        return view('admin.rubrics.index', compact('rubrics'));
    }
}
