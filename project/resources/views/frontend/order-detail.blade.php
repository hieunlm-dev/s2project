@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<center><h2>Order Detail</h2></center>
<div>
      @if(session('alert'))
    
        <section class='alert alert-success'>{{session('alert')}}</section>
    
    @endif  
    </div>
  <div class="wrap-breadcrumb">
    <ul>
      <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
      <li class="item-link"><a href="{{route('history.index')}}">Order History</a></li>
    </ul>
  </div>
  <div class=" main-content-area">

    <div class="wrap-iten-in-cart">
      <h3 class="box-title">Order Detail History</h3>
      <ul class="products-cart">
        @foreach($orderDetail as $item)
        <li class="pr-cart-item">
          <div class="product-image">
            <figure><img src="{{asset('images/' . $item -> image) }}" alt="{{$item->name}}"></figure>
          </div>
          <div class="product-name">
            <a class="link-to-product" href="{{ route('product-details',$item->product_id)}}">{{$item->name}}</a>
          </div>
          <div class="price-field produtc-price"><p class="price">{{ number_format($item->price,0,'','.')}} ₫</p></div>
          <div class="quantity" >
            <div class="quantity-input" >
              <input type="text" name="product-quantity" data-id={{$item->id}} value="x{{$item->quantity}}" data-max="120" pattern="[0-9]*" readonly>									
              
            </div>
          </div>
          <div class="price-field sub-total"><p class="price">{{number_format($item->quantity*$item->price,0,'','.')}} ₫</p></div>
          
        </li>
        @endforeach					
      </ul>
    </div>
    {{-- shipping info --}}
    <div class="wrap-address-billing" style="width: 100%" >
      <h3 class="box-title">Billing Address</h3>   
      <p class="row-in-form">
          <label for="fname">first name<span></span></label>
          <input id="fname" type="text" name="fname" required placeholder="Your name" value="{{$item->first_name}}" readonly>
      </p>
      <p class="row-in-form">
          <label for="lname">last name<span></span></label>
          <input id="lname" type="text" name="lname" required  placeholder="Your last name" value="{{$item->last_name}}" readonly>
      </p>
      <p class="row-in-form">
          <label for="email">Email Addreess:</label>
          <input id="email" type="email" name="email" required  placeholder="Type your email" value="{{$item->email}}" readonly>
      </p>
      <p class="row-in-form">
          <label for="phone">Phone number<span></span></label>
          <input id="phone" type="text" name="phone" required placeholder="10 digits format"  value="{{$item->phone_number}}" readonly>
      </p>
      <p class="row-in-form">
          <label for="add">Address:</label>
          <input id="add" type="text" name="add" required  placeholder="Street at apartment number" value="{{$item->address}}" readonly>
      </p>
      </div>
    {{-- end shipping info --}}
    <div class="summary" style="background-color: #fdfdfd; width: 100%; border: 1px solid #e6e6e6;
    padding: 25px 40px 21px 40px; display: table; margin-top: 20px;">
      <div class="order-summary" style="width:371px; padding-right: 75px;
      display: table-cell; vertical-align: middle;">
        <h4 class="title-box">Order Summary</h4>
        <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ number_format($item->grand_total,0,'','.') }} ₫</b></p>
        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
        <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{ number_format($item->grand_total,0,'','.')}} ₫</b></p>
      </div>
      <div class="checkout-info" style="width: 259px; padding-right: 10px;
      display: table-cell; vertical-align: middle;">
        <p class="summary-info"><span class="title">STATUS : </span><b class="index" style="color: red"> {{ strtoupper($item->status)}}</b></p>
        @if($item->status== 'pending')
        <a class="btn btn-danger" onclick="return confirm('Are you sure to cancel order?')" href="{{ route('history.edit', $item->order_id) }}">Cancel Order</a>
        @endif
        <br><br>
        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i><a class="link-to-shop" href="{{route('history.index')}}"> Back to Order History</a>
      </div>

    </div>

  </div><!--end main content area-->
</div><!--end container-->

@endsection