@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ action('HomeController@index') }}">Home</a></li>
                <li class="active">Search</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Offence</h3>
                </div>
                <div class="panel-body">
                    @if ($status = Session::get('status'))
                        <div class="alert alert-success">
                            <p>{{ $status }}</p>
                        </div>
                    @endif
                    <form data-form="search-form" class="form-search" action="{{ action('HomeController@search') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">I.C./Passport</label>
                            <input type="text" name="ic_passport" value="{{ app('request')->input('ic_passport') }}" class="form-control" placeholder="I.C./Passport">
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ app('request')->input('name') }}" class="form-control" placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-default btn-search" type="submit">Search</button>
                    </form>
                </div>                
            </div>
            @if ($offenders)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Results</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>I.C/Passport</th><th>Name</th><th>Number of offences</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($offenders) > 0)
                                @foreach ($offenders as $offender)
                                <tr><td><a href="{{ route('home.profile', ['uuid' => $offender->id]) }}">{{ $offender->ic_passport }}</a></td><td>{{ $offender->name }}</td><td>{{ $offender->offences }}</td></tr>
                                @endforeach
                            @else
                                <tr><td colspan="3">No result</td></tr>
                            @endif
                            </tbody>            
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Search Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>This search will use 1 credit, do you want to proceed to search?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="confirm-btn">Search</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection