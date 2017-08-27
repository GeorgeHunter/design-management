@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>{{ $project->project_code }}</h1>

        <div class="panel panel-primary">
            <div class="panel-heading">
                Files
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach ($project->files as $file)
                        <a href="{{ $file->path() }}" class="list-group-item">{{ $file->name }} - {{ $file->description }}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

@stop