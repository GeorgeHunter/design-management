<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function store()
    {
        $client = new Client();

        $client->client_details_id = request('client-name');
        $client->team_id = auth()->user()->current_team;
        $client->save();

        return back();
    }
}
