@extends('layouts.app')

@section('content')
<style>
.intro-text {
    text-align: center;
    padding-top: 200px;
    padding-bottom: 140px;
}
.intro-lead-in {
    font-size: 30px;
}

.intro-heading {
    font-size: 75px;
    font-weight: 700;
    text-align: center;
    font-family: 'Helvetica Neue', Helvetica, sans-serif;    
}

.front-banner {
    background: lightblue;
    background-size: cover;
    top: -22px;
    position: relative;
    background-color: #34495e;
    color: white;
    text-align: center;
}

.secondary-text {
    text-align: center;
    margin-bottom: 2em;
}
</style>
<div class="front-banner">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Hire With Peace In Mind</div>
            <div class="intro-heading">Bad Apple</div>
            <a class="btn btn-primary btn-lg" href="{{ action('Auth\RegisterController@register') }}">Register</a>
        </div>
    </div>
</div>
<div class="service">
    <div class="container">
        <div class="row">            
            <div class="col-xs-12">
                <div class="secondary-text">
                    <h2 class="secondary-heading">How does it work?</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lorem
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque praesentium, deserunt non corporis illum saepe inventore, cumque quam fuga fugiat eligendi laborum quaerat molestiae nostrum ratione. Officiis quos repudiandae asperiores.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lorem
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque praesentium, deserunt non corporis illum saepe inventore, cumque quam fuga fugiat eligendi laborum quaerat molestiae nostrum ratione. Officiis quos repudiandae asperiores.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lorem
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque praesentium, deserunt non corporis illum saepe inventore, cumque quam fuga fugiat eligendi laborum quaerat molestiae nostrum ratione. Officiis quos repudiandae asperiores.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lorem
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque praesentium, deserunt non corporis illum saepe inventore, cumque quam fuga fugiat eligendi laborum quaerat molestiae nostrum ratione. Officiis quos repudiandae asperiores.
                    </div>
                </div>
            </div>
        </div>
    </div></div>
@endsection
