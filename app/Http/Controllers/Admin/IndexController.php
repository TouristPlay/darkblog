<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use function view;

class IndexController extends Controller
{
    public function __invoke(Request $request) {
        return view('admin.index');
    }
}
