@extends('frontend.layout.layout')

@section('contents')

<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
            <li class="item-link"><span>check-out</span></li>
        </ul>
    </div>
    {{-- @if( !Session::has('cart') || empty(Session::get('cart')) --}}
    @if(Session::has('cart') || !empty(Session::get('cart')))
    <div class=" main-content-area">
        <form action="{{route('do-checkout')}}" method="post" name="frm-billing">
            @csrf 
            <div class="wrap-address-billing" style="width: 100%" >
                <h3 class="box-title">Billing Address</h3>   
                <p class="row-in-form">
                    <label for="fname">first name<span>*</span></label>
                    <input id="fname" type="text" name="fname" required placeholder="Your name" @if(Session::has('customer') ) value="{{session()->get('customer')->firstname}}"@endif>
                </p>
                <p class="row-in-form">
                    <label for="lname">last name<span>*</span></label>
                    <input id="lname" type="text" name="lname" required  placeholder="Your last name"  @if(Session::has('customer') ) value="{{session()->get('customer')->lastname}}"@endif>
                </p>
                <p class="row-in-form">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" placeholder="Type your email" @if(Session::has('customer') ) value="{{session()->get('customer')->email}}"@endif>
                </p>
                <p class="row-in-form">
                    <label for="phone">Phone number<span>*</span></label>
                    <input id="phone" type="text" name="phone" required placeholder="10 digits format"  @if(Session::has('customer') ) value="{{session()->get('customer')->phone}}"@endif>
                </p>
                <p class="row-in-form">
                    <label for="add">Address:<span>*</span></label>
                    <input id="add" type="text" name="add" required  placeholder="Street at apartment number"  @if(Session::has('customer') ) value="{{session()->get('customer')->address}}"@endif>
                </p>

                @if (!session()->has('customer'))
                <p class="row-in-form fill-wife">
                    <label class="checkbox-field">
                        <input name="createAccount" id="create-account" type="checkbox" checked  required>
                        <span>Create an account?</span>
                    </label>
                </p>
                @endif  
            </div>
            <div class="row-in-form">
                <b>Field with <span style="color:red">*</span> is required</b>  
           </div>
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    <p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input id="payment-method-cod" name="payment-method" value="cod" type="radio" checked>
                            <span>Cash On Delivery(COD)</span>
                            <span class="payment-desc">Customer pays for a good at the time of delivery</span>
                        </label>
                        <label class="payment-method">
                            <input id="payment-method-paypal" name="payment-method" value="paypal" type="radio">
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>

                    </div>
                    
                     @php
                        $total = 0;
                    @endphp
                    @foreach (Session::get('cart') as $item)
                        @php
                            $total += $item->quantity * $item->price;
                        @endphp
                    @endforeach
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{number_format($total,0,'','.')}}₫</span></p>
                    <button type="submit" id="order-button" class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title"><b>Free Shipping</b></span></p>
                    
                </div>
            </div>
        </form>
    </div><!--end main content area-->    
    @else
       <div class="text-center" style="padding:30px 0;">
            <h1>Your cart is empty</h1>
            <p>Add items to it now</p>
            <a href="{{route('shop')}}" class="btn btn-success">Shop Now</a>
    </div> 
    @endif
</div><!--end container-->

@endsection