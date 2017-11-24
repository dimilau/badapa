@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome!</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Manage User</h2>
                    <hr/>
                    <a class="btn btn-default" href="{{ action('UserController@list') }}" role="button">Manage Users</a>
                    <h2>Manage Offenders</h2>
                    <hr/>
                    <a class="btn btn-default" href="{{ action('OffenderController@list') }}" role="button">Manage Offenders</a>
                    <h2>Manage Offences</h2>
                    <hr/>
                    <a class="btn btn-default" href="{{ action('OffenceController@list') }}" role="button">Manage Offence</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
