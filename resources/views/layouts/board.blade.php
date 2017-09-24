@extends('layouts.app')
@section('app.content')
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-apple" aria-hidden="true"></span> Bad Apple</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="{{ app('request')->is('board/search') ? 'active' : '' }}"><a href="{{ action('BoardController@search') }}">Search</a></li>
            <li class="{{ app('request')->is('board/add') ? 'active' : '' }}"><a href="{{ action('BoardController@add') }}">Add</a></li>
        </ul>
    </div>
  </div>
</nav>
@yield('board.content')
@endsection
