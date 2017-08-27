<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function show($team, Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
