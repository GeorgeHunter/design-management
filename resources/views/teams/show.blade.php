@extends('layouts.app')

@section('content')

    <div class="container">

        Project List:

        @foreach($team->clients as $client)
            <h3>{{ $client->client_details_id }}</h3>
            <ul>
                @foreach ($client->projects as $project)
                    <li><a href="{{ $project->path() }}">{{ $project->project_code }}</a></li>
                @endforeach
            </ul>

        @endforeach

    </div>

@stop