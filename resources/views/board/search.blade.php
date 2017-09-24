@extends('layouts.board')
@section('board.content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Offence</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('BoardController@search') }}" method="GET">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">I.C./Passport</label>
                            <input type="text" name="ic_passport" value="{{ app('request')->input('ic_passport') }}" class="form-control" placeholder="I.C./Passport">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ app('request')->input('name') }}" class="form-control" placeholder="Name">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>                
            </div>
            @if ($offences)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Results</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>I.C/Passport</th><th>Name</th><th>Company Worked</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($offences) > 0)
                                @foreach ($offences as $offence)
                                <tr><td>{{ $offence->ic_passport }}</td><td>{{ $offence->name }}</td><td>{{ $offence->company_worked }}</td></tr>
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

@endsection