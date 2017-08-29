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
                        <div class="list-group-item">
                            <a download="/files/fhw68hliihnMFWmdDCpbwEcqBpbOOZ9I5ElLzHfj"><span class="glyphicon glyphicon-download-alt"></span></a> >>  {{ $version->identifier }} - {{ $version->status }} -
                        </div>
                    @empty
                        You haven't added any file versions yet
                    @endforelse
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/file-version/new" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @if ($errors->any())
                        <script>
                            jQuery('#myModal').modal({show: true});
                        </script>

                    @endif

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add File Version</h4>
                    </div>
                    <div class="modal-body">

                        <ul class="text-danger small" style="padding-top: 4px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <div class="form-group">
                            <label for="identifier">Identifier</label>
                            <input type="text" class="form-control" name="identifier" id="identifier" placeholder="Identifier" value="{{ old('identifier') }}">
                        </div>
                        <div class="form-group">
                            <label for="path">Path</label>
                            <input type="text" class="form-control" name="path" id="path" placeholder="Path" value="{{ old('path') }}">
                        </div>

                        <div class="form-group">
                            <label for="design-file">Upload your file</label>
                            <input type="file" id="design-file" name="design-file" class="form-control">
                        </div>
                        <input type="hidden" name="file-id" value="{{ $file->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop