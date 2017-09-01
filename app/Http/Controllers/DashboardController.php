<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $teams = auth()->user()->teams()->with('clients')->get();

        $clients = Client::where('team_id', auth()->user()->current_team)->get();

//
//
//
//        if ($request->session()->has('logged_in_team')) {
//            echo $request->session()->get('logged_in_team');
//        }
//
//        die;

        return view('dashboard', compact('teams', 'clients'));
    }
}
