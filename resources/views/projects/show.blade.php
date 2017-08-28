@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>{{ $project->project_code }}</h1>

        <div class="panel panel-primary">
            <div class="panel-heading level spread">
                <div>Files</div>
                <button type="button" class="btn btn-default btn-sm" aria-label="Right Align" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-plus text-primary" aria-hidden="true"></span>
                </button>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @forelse ($project->files as $file)
                        <a href="{{ $file->path() }}" class="list-group-item">{{ $file->name }} - {{ $file->description }}</a>
                    @empty
                        You haven't added any files to this project yet - <span class="text-primary interactive" data-toggle="modal" data-target="#myModal">click here to add one</span>
                    @endforelse
                </div>
            </div>
        </div>

    </div>





    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/files/new">
                    {{ csrf_field() }}


                    @if ($errors->any())
                        <script>
                            jQuery('#myModal').modal({show: true});
                        </script>

                    @endif

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add File</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                <ul class="text-danger small" style="padding-top: 4px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        <input type="hidden" name="project-id" value="{{ $project->id }}">
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