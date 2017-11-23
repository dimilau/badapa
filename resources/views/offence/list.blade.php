@extends('layouts.app')
@section('content')
@include('manage.modal')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ action('ManageController@index') }}">Manage</a></li>
                <li class="active">Manage Offences</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <div class="list-group">
                <a href="{{ action('UserController@list') }}" class="list-group-item">Users</a>
                <a href="{{ action('OffenderController@list') }}" class="list-group-item">Offenders</a>
                <a href="{{ action('OffenceController@list') }}" class="list-group-item active">Offences</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <form action="{{ action('OffenceController@list') }}" method="GET">
                        {{ csrf_field() }}
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Offences</h1>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-user" data-table="list-table">
                            <tr>
                                <th>ID</th><th>Offender</th><th>Offence Type</th><th>Company Worked</th><th>Approved</th><th>Action</th>                                
                            </tr>
                            @if (count($offences) > 0)
                                @foreach ($offences as $offence)
                                    <tr>
                                        <td>{{ $offence->id }}</td>   
                                        <td><a href="{{ action('OffenderController@show', ['id' => $offence->offender->id]) }}">{{ $offence->offender->name }}</a></td>
                                        <td>{{ $offence->offence_type == 'minor' ? 'Minor':'Major' }}</td>
                                        <td>{{ $offence->company_worked }}</td>
                                        <td class="{{ $offence->approved == 0 ? 'cell-no' : 'cell-yes' }}">{{ $offence->approved == '0' ? 'No' : 'Yes' }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="6">No result</td></tr>
                            @endif
                        </table>
                    </div>
                    {{ isset($get) ? $offences->appends($get)->links() : $offences->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection