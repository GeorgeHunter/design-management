<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $team = new Team;
        $team->name = request('team-name');
        $team->save();

        $team->users()->attach(auth()->user()->id, ['active' => 1, 'role' => 1]);

        $user = User::find(auth()->user()->id);
        $user->current_team = $team->id;
        $user->save();

        return redirect('/dashboard');

    }
}
