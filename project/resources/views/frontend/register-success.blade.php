@extends('frontend.layout.layout')

@section('contents')
    

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
            <li class="item-link"><span>login</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3" style="text-align: center">
            <p>Thank you for registering our website. </p>
            <p>Please <i>click</i> the <b>button</b> below for login into your account.</p> <br>
            <div ><a href="{{route('login')}}" class="btn btn-primary" >Let's go!</a></div>
            <br><br><br>
        </div> <br><br><br>
    </div><!--end row-->
    		

</div>

@endsection