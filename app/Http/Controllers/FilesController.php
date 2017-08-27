<?php

namespace App\Http\Controllers;

use App\File;
use App\FileVersion;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function show(File $file)
    {
        $versions = FileVersion::get();
        return view('files.show', compact('file', 'versions'));
    }
}
