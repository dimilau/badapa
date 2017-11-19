@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="thumbnail">
                <img src="http://via.placeholder.com/320x240">
                <div class="caption">
                    <h3>{{ $offender->name }}</h3>
                    <p>{{ $offender->ic_passport }}</p>
                </div>
            </div>
        
        </div>
        <div class="col-xs-12 col-md-6">
        @if (count($offender->approved_offences) == 0)
            <div class="alert alert-info" role="alert">There are no offences ready to be shown.</div>
        @else        
            @foreach ($offender->approved_offences as $offence)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $offence->company_worked}}</div>
                    <div class="panel-body">
                        <h4>Offence Type</h4>
                        <p>loss, damage to or misuse of the organisation’s property through negligence or carelessness</p>
                        <h4>Description</h4>
                        <p>{!! nl2br($offence->description) !!}</p>
                        <h4>Attachments</h4>
                        <ul>
                        @foreach ($offence->attachments as $key => $attachment)
                        <li><a href="{{ asset('storage/attachments/' . $attachment->filename) }}">Attachment {{ $key + 1 }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div>
</div>
@endsection