@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p>



                    <div>

                        You are a member of the following teams:

                        <ul>
                            @foreach ( auth()->user()->teams as $team)
                                <li><a href="{{ $team->path() }}">{{ $team->name }}</a></li>
                            @endforeach
                        </ul>


                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
