<?php

namespace App\Http\Controllers\Admin\Rubrics;

use App\Http\Controllers\Controller;
use App\Models\Forum\Rubric;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(Rubric $rubric)
    {
        $rubric->restore();
        return redirect(route('admin.rubrics.index'));
    }

}
