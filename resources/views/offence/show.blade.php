@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ action('ManageController@index') }}">Manage</a></li>
                    <li><a href="{{ action('OffenderController@list') }}">Manage Offences</a></li>
                    <li class="active">{{ $offence->id }}</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Offence</h1>
                    </div>
                    <div class="panel-body">
                        @if ($success = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $success }}</p>
                            </div>
                        @endif
                        <form action="{{ action('OffenceController@store') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $offence->id }}</p>
                                    <input type="hidden" name="id" value="{{ $offence->id }}">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('company_worked') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Company Worked</label>
                                <div class="col-sm-10">
                                    <input type="text" name="company_worked" class="form-control" placeholder="Company Worked" value="{{ old('company_worked') ? old('company_worked') : $offence->company_worked }}" required>
                                    @if ($errors->has('company_worked'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_worked') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="4" cols="50">{{ old('description') ? old('description') : $offence->description }}</textarea>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Approved</label>
                                <div class="col-sm-10">
                                    <select name="approved" class="form-control">
                                        <option value="1" {{ $offence->approved ? 'selected':'' }}>Yes</option>
                                        <option value="0" {{ !$offence->approved ? 'selected':'' }}>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Created at</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $offence->created_at}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Updated at</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $offence->updated_at}}</p>
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
                        Related Offender
                    </div>
                    <div class="panel-body">
                    @if (isset($offence->offender))
                        <a href="{{ action('OffenderController@show', ['id' => $offence->offender->id]) }}">{{ $offence->offender->name }}</a>
                    @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Related Attachment(s)
                    </div>
                    <div class="panel-body">
                    @if (count($offence->attachments) > 0)
                        <ul>
                        @foreach ($offence->attachments as $key => $attachment)
                        <li><a href="{{ asset('storage/attachments/' . $attachment->filename) }}">Attachment {{ $key + 1 }}</a></li>
                        @endforeach
                        </ul>
                    @else
                        No attachment.
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection