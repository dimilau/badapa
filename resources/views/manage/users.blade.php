@extends('layouts.app')
@section('content')
@include('manage.modal')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Users</h1>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered" data-table="users-table">
                        <tr>
                            <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Count</th><th>Action</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a href="{{ route('manage.user', ['id' => $user->id]) }}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>
                                @foreach ($user->roles as $role)
                                {{ $role->name }}
                                @endforeach
                                </td>                                
                                <td>{{$user->credit->count}}</td>
                                <td><form action="{{ action('ManageController@destroy', ['id' => $user->id]) }}" method="POST" class="form-delete">
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
@endsection
