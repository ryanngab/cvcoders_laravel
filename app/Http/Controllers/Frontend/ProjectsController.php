<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
}
