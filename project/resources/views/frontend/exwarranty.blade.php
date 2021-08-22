@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
        <li class="item-link"><span>Extended Warranty</span></li>
    </ul>
</div>
</div>

<div class="container">
    <div class="row" style="font-size: 15px">
        <div class="col-md-12">
            <p><b> A. What are the benefits of Extended Warranty? </b></p>
            <p>- Increase the value of the device when the standard warranty expires.</p>
            <p>- Use the service at 2HATStore nationwide.</p>
            <p>- Components repair and replacement service.</p>
            <p>- Participating in this program, you will always be assured of the quality of the device as well as enjoy the high quality service of authorized 2HATStore dealers.</p>
            <br>
            <p><b>B. Terms of Warranty Extension:</b></p>
            <p>- All warranty and non-warranty terms of the standard warranty (warranty of the new machine) are also valid under the Extended Warranty program (Excerpt from the warranty booklet).</p>
            <br>
            <p><b>C. Conditions of application:</b></p>
            <p>- The program applies to devices distributed through 2HATStore resellers, certified to participate in the Warranty Extension program.</p>
            <p>- To participate in the Warranty Extension program, you need to go to a 2HATStore dealer to purchase a Warranty Extension package before the expiration date of the standard warranty (warranty for new equipment).</p>
            <br>
            <p><i><b>(Warranty extension certificate stamp)</b></i></p>
            <br>
            <p>- 2HATStore Vietnam is responsible for each customer participating in the Extended Warranty program for defects in materials or workmanship, under normal conditions of use and repair, from the date of expiry of the warranty. standard (new equipment warranty).</p>
            <br>
            <p><b>D. Information to know:</b></p>
            <p>- The technician's requirements specified in the "User's Manual" must be fulfilled and recorded in the warranty book for the extended warranty to take effect. Warranty under Extended Warranty may be denied if service is not followed.</p>
            <br>
            <p><i><b>(Warranty extension certificate stamp)</b></i></p>
            <br>
            <p>- The selling price of a Warranty Extension package at the time of purchase of a new device is approximately 10% lower than the selling price of the Extended Warranty package but purchased after the time of purchase of the new device.</p>
        </div>
    </div>
</div><!--end container-->

@endsection