<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }
}
