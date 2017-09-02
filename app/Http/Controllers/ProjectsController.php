<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Project $project)
    {
        if (auth()->user()->current_team != $project->team_id) {
            die('naughty');
        }


        return view('projects.show', compact('project'));
    }
    
    public function store()
    {
        $project = new Project;

        $project->project_code= request('project-code');
        $project->client_id = request('client-id');
        $project->team_id = auth()->user()->current_team;
        $project->status = 1;

        $project->save();

        return redirect("/projects/$project->id");
    }
}
