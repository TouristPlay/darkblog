<?php

namespace App\Http\Controllers\Admin\Rubrics;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Rubric $rubric)
    {
        $rubric->delete();
        return redirect(route('admin.rubrics.index'));
    }
}
