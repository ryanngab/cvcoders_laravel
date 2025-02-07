<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('home.index', compact('projects'));
    }
}
