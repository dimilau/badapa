@extends('layouts.app')
@section('content')
@include('manage.modal')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ action('ManageController@index') }}">Manage</a></li>
                <li class="active">Manage Offenders</li>
            </ol>
        </div>
    </div>
    <div class="row">        
        <div class="col-md-3 col-xs-12">
            <div class="list-group">
                <a href="{{ action('UserController@list') }}" class="list-group-item">Users</a>
                <a href="{{ action('OffenderController@list') }}" class="list-group-item active">Offenders</a>
                <a href="{{ action('OffenceController@list') }}" class="list-group-item">Offences</a>
            </div>
            <div class="panel panel-default panel-search">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <form action="{{ action('OffenderController@list') }}" method="GET" class="form-search">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>IC/Passport</label>
                            <input type="text" name="ic_passport" class="form-control" placeHolder="IC/Passport" value="{{ old('ic_passport') ? old('ic_passport'): ''}}">
                            <p class="help-block">Add % to match partially. E.g.: John %</p>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') ? old('name') : '' }}">                            
                            <p class="help-block">Add % to match partially. E.g.: John %</p>
                        </div>           
                        <div class="form-group">
                            <label>Approved</label>
                            <select name="approved" class="form-control">
                                <option value="">-</option>
                                <option value="1" {{ !is_null(old('approved')) && old('approved') == 1 ? 'selected':'' }}>Approved</option>
                                <option value="0" {{ !is_null(old('approved')) && old('approved') == 0 ? 'selected':'' }}>Not Approved</option>
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif         
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Offenders</h1>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-user" data-table="list-table">
                            <tr>
                                <th>ID</th><th>IC/Passport</th><th>Name</th><th>Approved</th><th>Action</th>
                            </tr>
                            @if (count($offenders) > 0)
                                @foreach ($offenders as $offender)
                                    <tr>
                                        <td>{{$offender->id}}</td>
                                        <td><a href="{{ action('OffenderController@show', ['id' => $offender->id]) }}">{{$offender->ic_passport}}</a></td>
                                        <td>{{$offender->name}}</td>
                                        <td class="{{ $offender->approved == 0 ? 'cell-no' : 'cell-yes' }}">{{ $offender->approved == 0 ? 'No' : 'Yes' }}</td>
                                        <td>
                                            <form action="{{ action('OffenderController@destroy', ['id' => $offender->id]) }}" method="POST" class="form-delete">
                                                {{ csrf_field() }}
                                                <input name="delete" value="Delete" type="submit" class="btn btn-xs btn-danger delete"/>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="5">No result</td></tr>
                            @endif
                        </table>
                    </div>
                    {{ isset($get) ? $offenders->appends($get)->links() : $offenders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
