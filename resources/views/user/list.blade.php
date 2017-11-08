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
                <a href="#" class="list-group-item active">Users</a>
                <a href="#" class="list-group-item">Offenders</a>
                <a href="#" class="list-group-item">Offences</a>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Users</h1>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" data-table="users-table">
                            <tr>
                                <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Count</th><th>Action</th>
                            </tr>
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
                                    <td>{{$user->credit->count}}</td>
                                    <td><form action="{{ action('UserController@destroy', ['id' => $user->id]) }}" method="POST" class="form-delete">
                                            {{ csrf_field() }}
                                            <input name="delete" value="Delete" type="submit" class="btn btn-xs btn-danger delete"/>
                                        </form></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
