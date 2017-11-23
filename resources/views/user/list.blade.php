@extends('layouts.app')
@section('content')
@include('manage.modal')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ action('ManageController@index') }}">Manage</a></li>
                <li class="active">Manage Users</li>
            </ol>
        </div>
    </div>
    <div class="row">        
        <div class="col-md-3 col-xs-12">
            <div class="list-group">
                <a href="{{ action('UserController@list') }}" class="list-group-item active">Users</a>
                <a href="{{ action('OffenderController@list') }}" class="list-group-item">Offenders</a>
                <a href="{{ action('OffenceController@list') }}" class="list-group-item">Offences</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <form action="{{ action('UserController@list') }}" method="GET">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') ? old('name') : '' }}">                            
                            <p class="help-block">Add % to match partially. E.g.: John %</p>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeHolder="Email" value="{{ old('email') ? old('email'): ''}}">
                            <p class="help-block">Add % to match partially. E.g.: John %</p>
                        </div>
                        <div class="form-group">
                            <label>Verified</label>
                            <select name="verified" class="form-control">
                                <option value="">-</option>
                                <option value="1" {{ !is_null(old('verified')) && old('verified') == 1 ? 'selected':'' }}>Verified</option>
                                <option value="0" {{ !is_null(old('verified')) && old('verified') == 0 ? 'selected':'' }}>Not Verified</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Approved</label>
                            <select name="approved" class="form-control">
                                <option value="">-</option>
                                <option value="1" {{ !is_null(old('approved')) && old('approved') == 1 ? 'selected':'' }}>Approved</option>
                                <option value="0" {{ !is_null(old('approved')) && old('approved') == 0 ? 'selected':'' }}>Not Approved</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <option value="">-</option>
                                <option value="client" {{ old('role') == "client" ? 'selected':'' }}>Client</option>
                                <option value="admin" {{ old('role') == "admin" ? 'selected':'' }}>Admin</option>
                                <option value="super admin" {{ old('role') == "super admin" ? 'selected':'' }}>Super Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Count</label>
                            <input type="text" name="count" class="form-control" placeHolder="Count" value="{{ old('count') ? old('count'): ''}}">
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
                    <h1 class="panel-title">Users</h1>
                </div>
                <div class="panel-body">                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-user" data-table="list-table">
                            <tr>
                                <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Verified</th><th>Approved</th><th>Count</th><th>Action</th>
                            </tr>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td><a href="{{ action('UserController@show', ['id' => $user->id]) }}">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                        @endforeach
                                        </td>
                                        <td class="{{ $user->verified == 0 ? 'cell-no' : 'cell-yes' }}">{{ $user->verified == 0 ? 'No' : 'Yes' }}</td>
                                        <td class="{{ $user->approved == 0 ? 'cell-no' : 'cell-yes' }}">{{ $user->approved == 0 ? 'No' : 'Yes' }}</td>
                                        <td>{{$user->credit->count}}</td>
                                        <td>
                                            <form action="{{ action('UserController@destroy', ['id' => $user->id]) }}" method="POST" class="form-delete">
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
                    {{ isset($get) ? $users->appends($get)->links() : $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
