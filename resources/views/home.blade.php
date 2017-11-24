@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome, {{ Auth::user()->name }}</h1>
                    <hr/>

                    <div class="list-group">
                        <a href="{{ action('HomeController@search') }}" class="list-group-item">
                            <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</h4>
                            <p class="list-group-item-text">Search for offender. Enter offenders passport/IC, or name to search. You have {{ Auth::user()->credit->count }} search(es) left.</p>
                        </a>
                        <a href="{{ action('HomeController@add') }}" class="list-group-item">
                            <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</h4>
                            <p class="list-group-item-text">Add an offender. Requireds offenders details, photo, and proof.</p>
                        </a>
                    </div>

                    <h3>Offences that you've added</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Offender Name</th><th>Company Worked</th><th>Offence Type</th><th>Approved</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($offences) > 0)
                                @foreach ($offences as $offence)
                                    <tr>
                                        <td>{{ $offence->offender->name }}</td>
                                        <td>{{ $offence->company_worked }}</td>
                                        <td>{{ $offence->offence_type }}</td>
                                        <td class="{{ $offence->approved == 0 ? 'cell-no' : 'cell-yes' }}">{{ $offence->approved == '0' ? 'No' : 'Yes' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="4">You've not added any offenders and offences.</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
