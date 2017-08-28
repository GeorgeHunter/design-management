<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function show(Project $project)
    {
        if (auth()->user()->current_team != $project->team_id) {
            die('naughty');
        }


        return view('projects.show', compact('project'));
    }
}
