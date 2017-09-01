@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Create a Team</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/team">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="team-name" class="col-md-4 control-label">Team Name</label>

                            <div class="col-md-6">
                                <input id="team-name" type="text" class="form-control" name="team-name" value="{{ old('team-name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Team
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop