@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>{{ $file->name }}</h3>
        <h4 style="margin-bottom: 40px;">{{ $file->description }}</h4>




        <div class="panel panel-primary">
            <div class="panel-heading level spread">
                <div>File Versions</div>
                <button type="button" class="btn btn-default btn-sm" aria-label="Right Align" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-plus text-primary" aria-hidden="true"></span>
                </button>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @forelse($versions as $version)

                        {{--                <div class="list-group-item">{{ $version->identifier }} - {{ $version->status }} - <a href="{{ $version->path() }}">Download</a></div>--}}
                        <div class="list-group-item">{{ $version->identifier }} - {{ $version->status }} - <a href="">Download</a></div>
                    @empty
                        You haven't added any file versions yet
                    @endforelse
                </div>
            </div>
        </div>


    </div>

@stop