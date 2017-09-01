@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading level spread">
                    Dashboard
                    <button title="Add Client" type="button" class="btn btn-default btn-sm" aria-label="Right Align" data-toggle="modal" data-target="#addClientModal">
                        <span class="glyphicon glyphicon-plus text-primary" aria-hidden="true"></span>
                    </button>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p>



                    <div>


                        <h3>Project List:</h3>

                        @forelse($clients as $client)
                            <h3>{{ $client->client_details_id }}</h3>
                            <ul>
                                @foreach ($client->projects as $project)
                                    <li><a href="{{ $project->path() }}">{{ $project->project_code }}</a></li>
                                @endforeach
                            </ul>
                        @empty
                            You haven't added any clients yet, click here to do so
                        @endforelse


                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/clients">
                {{ csrf_field() }}

                @if ($errors->any())
                    <script>
                        jQuery('#myModal').modal({show: true});
                    </script>

                @endif

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Client</h4>
                </div>
                <div class="modal-body">

                    <ul class="text-danger small" style="padding-top: 4px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <div class="form-group">
                        <label for="client-name">Client Name</label>
                        <input type="text" class="form-control" name="client-name" id="client-name" placeholder="Client Name" value="{{ old('client-name') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
