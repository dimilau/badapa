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

                    <h1>Welcome, {{ Auth::user()->name }}</h1>
                    <ul>
                        <li><a href="{{ action('HomeController@search') }}">Search</a> for offenders. You have {{ Auth::user()->credit->count }} search(es) left.</li>
                        <li><a href="{{ action('HomeController@add') }}">Add</a> an offender</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
