<?php

namespace App\Http\Controllers;

use App\File;
use App\FileVersion;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(File $file)
    {
        if (auth()->user()->current_team != $file->project->team_id) {
            die('naughty');
        }

        $versions = FileVersion::latest()->where('file_id', $file->id)->get();
        return view('files.show', compact('file', 'versions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $file = new File;
        $project = Project::find(request('project-id'));

        if ($project->team_id != auth()->user()->current_team) {
            die('naughty');
        }

        $file->name = request('name');
        $file->description = request('description');
        $file->project_id = $project->id;

        $file->save();

        return redirect('/files/' .  $file->id);

    }

}
