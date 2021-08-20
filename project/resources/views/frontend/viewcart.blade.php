@extends('frontend.layout.layout')

@section('contents')

@include('sweetalert::alert')


<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>View Cart</span></li>
				</ul>
			</div>
			<div class=" main-content-area">

				<form action="">
				@php
					$total=0;
				@endphp
				<div class="wrap-iten-in-cart">
					<h3 class="box-title">Products Name</h3>
					@if(Session::has('cart'))
					<ul class="products-cart">
						

						@foreach(Session::get('cart') as $item)

						@php
							$total+= $item->quantity * $item->price;
						@endphp
						<li class="pr-cart-item">
							<div class="product-image">
								<figure><img src="{{asset('images/' . $item -> image) }}" alt="{{$item->name}}"></figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="{{ route('product-details',$item->id)}}">{{$item->name}}</a>
							</div>
							<div class="price-field produtc-price"><p class="price">{{ number_format($item->price,0,'','.')}} ₫</p></div>
							<div class="quantity" >
								<div class="quantity-input" >
									<input type="text" name="product-quantity" data-id={{$item->id}} value="{{$item->quantity}}" data-max="120" pattern="[0-9]*" >									
									<a class="btn btn-increase" href="#"></a>
									<a class="btn btn-reduce" href="#"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">{{number_format($item->quantity*$item->price,0,'','.')}} ₫</p></div>
							<div class="delete" >
								<a href="#" class="btn btn-delete" title="" data-id={{$item->id}} " >
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
						</li>
						@endforeach					
					</ul>
					@endif
				</div>

				<div class="summary" style="background-color: #fdfdfd; width: 100%; border: 1px solid #e6e6e6;
				padding: 25px 40px 21px 40px; display: table; margin-top: 20px;">
					<div class="order-summary" style="width:371px; padding-right: 75px;
					display: table-cell; vertical-align: middle;">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ number_format($total,0,'','.') }} ₫</b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">{{ number_format($total,0,'','.')}} ₫</b></p>
					</div>
					<div class="checkout-info" style="width: 259px; padding-right: 10px;
					display: table-cell; vertical-align: middle;">
						<a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
						<a class="link-to-shop" href="{{route('home')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear" style="display: table-cell; vertical-align: middle;">
						{{-- <a class="btn btn-clear" href="#">Clear Shopping Cart</a> --}}
					</div>
				</div>

				</form>

			</div><!--end main content area-->
		</div><!--end container-->


@endsection


@section('my-scripts')

<script>
	// setup csrf-token cho post method
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $('.btn-delete').click(function(e) {
		
	$("body").on("click",".btn-delete",function(e){
        e.preventDefault();     // hủy chức năng chuyển trang của thẻ a
        pid=$(this).data("id");
		var current_object = $(this);

        $.ajax({
            type:'GET',
            url:'{{ route('delete-cart-item') }}',
            data:{pid:pid},
            success:function(data){
				swal({
					title: "Delete completed",
					text: "This product has been removed from your cart",
					icon: "success",
					type: "success",
					button: "Okay!",
				}).then(function(){ 
       				location.reload();
   				}
			);
				// window.location='{{ route('view-cart') }}';
            }
        });	
	})


	$(".quantity-input").on('click', '.btn', function(event) {
		event.preventDefault();
		
		var _this = $(this),
			_input = _this.siblings('input[name=product-quantity]'),
			_current_value = _this.siblings('input[name=product-quantity]').val(),
			_max_value = _this.siblings('input[name=product-quantity]').attr('data-max');
		if(_this.hasClass('btn-reduce')){
			if (parseInt(_current_value, 10) > 1) _input.val(parseInt(_current_value, 10) - 1);
		}else {
			if (parseInt(_current_value, 10) < parseInt(_max_value, 10)) _input.val(parseInt(_current_value, 10) + 1);
		}

		// pid=$('.quantity-input').data("id");
		pid = _input.data("id");
		quantity = _input.val();
		$.ajax({
            type:'GET',
            url:'{{ route('change-cart-quantity') }}',
            data:{pid:pid,quantity:quantity},
            success:function(data){
				window.location='{{ route('view-cart') }}';
            }
        });	
	});
</script>

@endsection