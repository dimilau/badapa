@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ action('ManageController@index') }}">Manage</a></li>
                    <li><a href="{{ action('UserController@list') }}">Manage Users</a></li>
                    <li class="active">{{ $user->name }}</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">User</h1>
                    </div>
                    <div class="panel-body">
                        @if ($success = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $success }}</p>
                            </div>
                        @endif
                        <form action="{{ action('UserController@store') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $user->id }}</p>
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') ? old('name') : $user->name }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') ? old('email') : $user->email }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Verified</label>
                                <div class="col-sm-10">
                                    <select name="verified" class="form-control">
                                        <option value="1" {{ $user->verified ? 'selected':'' }}>Yes</option>
                                        <option value="0" {{ !$user->verified ? 'selected':'' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Created at</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $user->created_at}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Updated at</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $user->updated_at}}</p>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('count') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Count</label>
                                <div class="col-sm-10">
                                    <input type="text" name="count" class="form-control" value="{{ old('count') ? old('count') : $user->credit->count }}" required/>
                                    @if ($errors->has('count'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">User Type</label>
                                <div class="col-sm-10">
                                    @foreach ($roles as $role)                                    
                                    <div class="checkbox">
                                        <label>
                                            <input name="roles[]" type="checkbox" value="{{ $role->id }}" {{in_array($role->id, $user->roles()->pluck('roles.id')->toArray()) ? 'checked':''}}>
                                            {{ ucfirst($role->name) }}
                                        </label>
                                    </div>                                    
                                    @endforeach
                                    @if ($errors->has('roles'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roles') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection