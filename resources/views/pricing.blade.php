@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Pricing</h2>
        <!-- item -->
        <div class="col-md-4 text-center">
            <div class="panel panel-danger panel-pricing">
                <div class="panel-heading">
                    <i class="fa fa-desktop"></i>
                    <h3>Member Registration</h3>
                </div>
                <div class="panel-body text-center">
                    <p><strong>MYR50 Lifetime Membership</strong></p>
                </div>
                <ul class="list-group text-center">
                    <li class="list-group-item"><i class="fa fa-check"></i> Unlimited upload of offenders</li>                    
                </ul>
            </div>
        </div>
        <!-- /item -->

        <!-- item -->
        <div class="col-md-4 text-center">
            <div class="panel panel-warning panel-pricing">
                <div class="panel-heading">
                    <i class="fa fa-desktop"></i>
                    <h3>Basic Purchase</h3>
                </div>
                <div class="panel-body text-center">
                    <p><strong>MYR49 Per Search</strong></p>
                </div>
                <ul class="list-group text-center">
                    <li class="list-group-item"><i class="fa fa-check"></i>Free Lifetime Membership</li>
                    <li class="list-group-item"><i class="fa fa-check"></i>Unlimited upload of offenders</li>
                </ul>
            </div>
        </div>
        <!-- /item -->

        <!-- item -->
        <div class="col-md-4 text-center">
            <div class="panel panel-success panel-pricing">
                <div class="panel-heading">
                    <i class="fa fa-desktop"></i>
                    <h3>Package Purchase</h3>
                </div>
                <div class="panel-body text-center">
                    <p><strong>MYR299 = 12 Search</strong></p>
                </div>
                <ul class="list-group text-center">
                    <li class="list-group-item"><i class="fa fa-check"></i>+ Free Lifetime Membership</li>
                    <li class="list-group-item"><i class="fa fa-check"></i>+ Unlimited upload of offenders</li>
                </ul>
            </div>
        </div>
        <!-- /item -->
    </div>
    <div>
        <h2>Contact Us</h2>
        <p>Call Our Hotline <strong>1300 88 2112</strong> or email <strong><a href="mailto:payment@badapple.asia">payment@badapple.asia</a></strong>
    </div>
</div>                
@endsection