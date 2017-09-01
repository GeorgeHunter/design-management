<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileSettingsController extends Controller
{
    public function update(File $file)
    {
        $file->default_prefix = request('default_prefix');

        $file->save();

        return back();
    }
}
