@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">                        
        <div class="col-xs-12 col-md-3">
            <div class="row">
                <div class="col-xs-12">
                    <h1>{{ $offender->name }}</h1>
                    <p class="lead">{{ $offender->ic_passport }}</p>
                </div>                
            </div>
            <div class="row">
                @foreach ($offender->photos as $photo)
                <div class="col-xs-6">
                    <div class="thumbnail">                        
                        <a href="{{ asset('storage/photos/' . $photo->filename )}}"><img src="{{ asset('storage/photos/' . $photo->thumbnail() )}}"></a>
                    </div>
                </div>
                @endforeach                
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
                        @if ($offence->offence_type == 'minor')
                            <p>Minor disciplinary concern</p>
                        @elseif ($offence->offence_type == 'major')
                            <p>Major disciplinary concern</p>
                        @endif
                        <p></p>
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