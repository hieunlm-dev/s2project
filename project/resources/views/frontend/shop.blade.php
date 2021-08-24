@extends('frontend.layout.layout')

@section('contents')

<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
					<li class="item-link"><span>All Products</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="{{asset('assets/images/samsung.jpg')}}" alt=""></figure>
						</a>
					</div>
					<div>
						  @if(session('alert'))
						    <section class='alert alert-warning'>{{session('alert')}}</section>
						@endif  
						  @if(session('alert1'))
						    <section class='alert alert-success'>{{session('alert1')}}</section>
						@endif  
					</div>
					
					<form action="{{route('sort')}}">
						<div class="wrap-shop-control">	
							<h1 class="shop-title">Mobile Store</h1>
							<div class="wrap-right">
								<div class="sort-item orderby ">
									<select name="orderby" class="use-chosen" onchange="this.form.submit()">
										<option value="1" >--Sort--</option>
										<option value="date" >Sort by date</option>
										<option value="price">Sort by price: low to high</option>
										<option value="price-desc">Sort by price: high to low</option>
										<option value="5000000">Under 5M</option>
										<option value="10000000">From 5M to 10M</option>
										<option value="20000000">From 10M to 20M</option>
										<option value="20000001">Over 20M</option>
									</select>
								</div>
							</div>
						</div><!--end wrap shop control-->
					</form>

					<div class="row">
						
					
						<ul class="product-list grid-products equal-container" id="id01">
							
							@forelse ($products as $item)
								<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="{{route('product-details',$item->id)}}" title="{{$item->name}}">
											<figure><img src="{{asset('images/'.$item->image)}}" style="width: auto; height:166px;" alt="img"></figure>
										</a>
									</div>
									
									<div class="product-info">
										<a href="{{route('product-details',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
										<div class="wrap-price"><span class="product-price">{{ number_format($item->price,0,'','.')}} ₫</span></div>
										<input type="hidden" id="pid" value="{{$item->id}}">
										@if ($item->quantity != 0)  
										<a href="#" class="btn add-to-cart" data-id="{{$item->id}}">Add To Cart</a>
										@else
										<a href="{{route('product-details',$item->id)}}" class="btn add-to-cart" >Not Available</a>
										@endif
									</div>
						
								</div>
							</li>
							@empty
								 <div class="product product-style-3  equal-elem">
                                <h3 align="center">Cannot find your product </h3>
                            </div>
							@endforelse
						</ul>
					</div>
					<div class="wrap-pagination-info">
						<div class="d-flex justify-content-center">
							{!!$products->appends(request()->input())->links()!!}
						
						</div>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
							
								<form action="{{route('shop')}}" >
									@foreach($brands as $item)
									
									<div><input type="submit" class="btn btn-secondary" style="width: 90px; margin:2px" value="{{$item->name}}" name="brand"></div>
									@endforeach
								</form>
								
							
							</ul>
						</div>
					</div><!-- brand widget-->

				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

@endsection

@if(isset($item))
@section('my-scripts')
<script>
	// setup csrf-token cho post method
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add-to-cart').click(function(e) {
        e.preventDefault();     // hủy chức năng chuyển trang của thẻ a
        quantity = 1;
		pid = $(this).data('id');
        // pid= $('#pid').val();
        //alert(quantity);

        $.ajax({
            type:'GET',
            url:'{{ route('add-cart') }}',
            data:{pid:pid, quantity:quantity},
            success:function(data){
                swal({
					title: "Adding successfully",
					text: "This product has been successfully added to your cart",
					icon: "success",
					button: "Okay!",
				}).then(function(){
					window.location.reload();
				});
            }
        });	
	})
</script>
@endsection
@endif