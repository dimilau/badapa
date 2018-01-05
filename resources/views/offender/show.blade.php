@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ action('ManageController@index') }}">Manage</a></li>
                    <li><a href="{{ action('OffenderController@list') }}">Manage Offenders</a></li>
                    <li class="active">{{ $offender->name }}</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Offender</h1>
                    </div>
                    <div class="panel-body">
                        @if ($success = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $success }}</p>
                            </div>
                        @endif
                        <form action="{{ action('OffenderController@store') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $offender->id }}</p>
                                    <input type="hidden" name="id" value="{{ $offender->id }}">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ic_passport') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">IC/Passport</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ic_passport" class="form-control" placeholder="IC/Passport" value="{{ old('ic_passport') ? old('ic_passport') : $offender->ic_passport }}" required>
                                    @if ($errors->has('ic_passport'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ic_passport') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') ? old('name') : $offender->name }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" name="country" class="form-control" placeholder="Country" value="{{ old('country') ? old('country') : $offender->country }}" required>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Approved</label>
                                <div class="col-sm-10">
                                    <select name="approved" class="form-control">
                                        <option value="1" {{ $offender->approved ? 'selected':'' }}>Yes</option>
                                        <option value="0" {{ !$offender->approved ? 'selected':'' }}>No</option>
                                    </select>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Created at</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $offender->created_at}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Updated at</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $offender->updated_at}}</p>
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

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Related Offence(s)
                    </div>
                    <div class="panel-body">
                    @if (count($offender->offences) > 0)
                        <ul>                        
                        @foreach ($offender->offences as $offence)
                            <li><a href="{{ action('OffenceController@show', ['id' => $offence->id]) }}">{{ $offence->company_worked }}</a></li>
                        @endforeach
                        </ul>
                    @else
                        No related offence.
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection