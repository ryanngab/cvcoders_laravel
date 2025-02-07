<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SourceCodeController extends Controller
{
    //
    public function index()
    {
        return view('source-code.index');
    }
}
