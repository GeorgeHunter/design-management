@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>{{ $file->name }}</h3>
        <h4 style="margin-bottom: 40px;">{{ $file->description }}</h4>

        <div class="list-group">
            @foreach($versions as $version)

                <div class="list-group-item">{{ $version->identifier }} - {{ $version->status }} - <a href="{{ $file->path() }}">Download</a></div>

            @endforeach
        </div>


    </div>

@stop