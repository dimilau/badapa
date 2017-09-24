@extends('layouts.board')

@section('board.content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Add Offences</h3>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($success = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $success }}</p>
                        </div>
                    @endif
                    <form action="{{ action('BoardController@store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">I.C./Passport</label>
                            <input type="text" name="ic_passport" value="{{ old('ic_passport') }}" class="form-control" placeholder="I.C./Passport">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Company worked in</label>
                            <input type="text" name="company_worked" value="{{ old('company_worked') }}" class="form-control" placeholder="Company worked in">
                        </div>
                        <div class="form-group">
                            <label for="">Types of offences</label>                            
                            <div class="radio">
                                <label>
                                    <input type="radio" name="offence_type" value="disciplinary" 
                                        @if(old('offence_type') == 'disciplinary') checked @endif>
                                    Disciplinary issue
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="offence_type" value="police"
                                        @if(old('offence_type') == 'police') checked @endif>
                                    Police case
                                </label>
                            </div>
                            <p class="help-block">Choose one and upload supporting photos/documents in the next field.</p>                            
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
                    </form>                    
                </div>
            </div>    


        </div>
    </div>
</div>
@endsection