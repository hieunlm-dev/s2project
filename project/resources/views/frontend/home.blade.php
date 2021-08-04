@extends('frontend.layout.layout')

@section('contents')
    

<div class="container">

    <!--MAIN SLIDE-->
    <div class="wrap-main-slide">
        @include('frontend.home.slideshow') 

    <!--BANNER-->
    <div class="wrap-banner style-twin-default">
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="{{asset('assets/images/iphone.png')}}" alt="" width="580" height="190"></figure>
            </a>
        </div>
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="{{asset('assets/images/samsung.jpg')}}" alt="" width="580" height="190"></figure>
            </a>
        </div> 
    </div>

    <!--Featured-->
    <div class="wrap-show-advance-info-box style-1" >
        @include('frontend.home.featuredProduct')
    </div>

    <!--Latest Products-->
    <div class="wrap-show-advance-info-box style-1">
        @include('frontend.home.latestProduct') 
    </div>
    		

</div>

@endsection