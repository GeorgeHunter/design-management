<?php

namespace App\Http\Controllers;

use App\File;
use App\FileVersion;
use Illuminate\Http\Request;

class FileVersionsController extends Controller
{
    public function store(Request $request)
    {


        $file_version = new FileVersion;

        $request->validate([
            'identifier' => 'required',
            'path' => 'required'
        ]);

        $file = File::find(request('file-id'));

        if ($file->project->team->id != auth()->user()->current_team) {
            die('naughty');
        }

        $path = $request->file('design-file')->store('designs');

        $file_version->identifier = request('identifier');
        $file_version->path = '/' . $path;
        $file_version->file_id = $file->id;
        $file_version->status = 'Created';

        $file_version->save();

        return $path;

    }
}
