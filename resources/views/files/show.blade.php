@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="level spread">
            <h3 style="margin: 0;">{{ $file->name }}</h3>
            <button type="button" class="btn btn-link" aria-label="Right Align" data-toggle="modal" data-target="#settings-modal">
                <span class="glyphicon glyphicon-cog" style="font-size: 2em;" aria-hidden="true"></span>
            </button>        </div>
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
                        <div class="list-group-item level spread">
                            <div>{{ $version->identifier }} - {{ $version->status }}</div>
                            <a href="/files/fhw68hliihnMFWmdDCpbwEcqBpbOOZ9I5ElLzHfj">
                                <span class="glyphicon glyphicon-download-alt"></span>
                            </a>
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
                            @if (old('identifier'))
                                <input type="text" class="form-control" name="identifier" id="identifier" placeholder="Identifier" value="{{ old('identifier') }}">
                            @else
                                <input type="text" class="form-control" name="identifier" id="identifier" placeholder="Identifier" value="{{ $next_version }}">
                            @endif
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

    <div class="modal fade" id="settings-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/files/settings/{{ $file->id }}">
                    {{ csrf_field() }}

                    {{ method_field('patch') }}

                    @if ($errors->any())
                        <script>
                            jQuery('#myModal').modal({show: true});
                        </script>

                    @endif

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">File Settings</h4>
                    </div>
                    <div class="modal-body">

                        <ul class="text-danger small" style="padding-top: 4px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>


                        <div class="form-group">
                            <label for="default_prefix">Default File Prefix</label>
                            <input type="text" id="default_prefix" name="default_prefix" class="form-control" value="{{ $file->default_prefix }}">
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