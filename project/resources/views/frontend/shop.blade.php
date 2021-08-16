@extends('frontend.layout.layout')

@section('contents')

<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>All Products</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
						</a>
					</div>
					<form action="{{route('sort')}}">
						<div class="wrap-shop-control">	

						<h1 class="shop-title">Mobile Store</h1>

						<div class="wrap-right">
							
							<button type="submit" class="btn btn-primary" method="GET" >Sort product</button>
							<div class="sort-item orderby ">
								<select name="orderby" class="use-chosen" >
									<option value="menu_order" selected="selected">Default sorting</option>									
									<option value="date"  >Sort by newness</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
							</div>

							<!-- <div class="sort-item product-per-page">
								<select name="post-per-page" class="use-chosen" >
									<option value="12" selected="selected">12 per page</option>
									<option value="16">16 per page</option>
									<option value="18">18 per page</option>
									<option value="21">21 per page</option>
									<option value="24">24 per page</option>
									<option value="30">30 per page</option>
									<option value="32">32 per page</option>
								</select>
							</div> -->

							<div class="change-display-mode">
								<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
								<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
							</div>

						</div>

					</div><!--end wrap shop control-->

					</form>
					

					<div class="row">
						<ul class="product-list grid-products equal-container" id="id01">
							{{-- @forelse($products as $item)
							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="{{route('product-details',$item->id)}}" title="{{$item->name}}">
											<figure><img src="{{asset('images/'.$item->image)}}" style="width: 250px; height:166px;" alt="img"></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="{{route('product-details',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
										<div class="wrap-price"><span class="product-price">{{ number_format($item->price,0,'','.')}} ₫</span></div>
										<a href="#" class="btn add-to-cart">Add To Cart</a>
									</div>
								</div>
							</li>
							@empty
							 <div class="product product-style-3  equal-elem">
                                <h3 align="center">Cannot find your product </h3>
                            </div>
							@endforelse --}}
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
										<a href="#" class="btn add-to-cart" data-id="{{$item->id}}">Add To Cart</a>
									</div>
									<div class="product-info">

										<form action="{{route('wish-list.store')}}" method="post">
											@csrf
											<input type="hidden" value="{{$item->id}}" name="product_id" >
											<input type="submit" class="btn btn-add-to-cart" class="form-control"
											style="display: inline-block;
											width: 100%;
											font-size: 14px;
											line-height: 34px;
											color: #888888;
											background: #f5f5f5;
											border: 1px solid #e6e6e6;
											text-align: center;
											font-weight: 600;
											border-radius: 0;
											padding: 2px 10px;
											-webkit-transition: all 0.3s ease 0s;
											-o-transition: all 0.3s ease 0s;
											-moz-transition: all 0.3s ease 0s;
											transition: all 0.3s ease 0s;
											margin-top: 14px;"
											value="Add To Wishlist">
										</form>
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
<<<<<<< HEAD
			
=======
>>>>>>> dd628b916ea27fe6d6554f07591b3ba49e56f008
						<div class="d-flex justify-content-center">
							{!! $products->links() !!}
						</div>

					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
								{{-- Nhờ Ân làm phần này bằng nút bấm --}}
								<li class="list-item"><a class="filter-link " href="#">Brand</a></li> 
							
							</ul>
						</div>
					</div><!-- brand widget-->

					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Price</h2>
						<div class="widget-content">
							<div id="slider-range"></div>
							<p>
								<label for="amount">Price:</label>
								<input type="text" id="amount" readonly>
								<button class="filter-submit">Filter</button>
							</p>
						</div>
					</div><!-- Price-->

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
					button: "Aww yiss!",
				}).then(function(){
					window.location.reload();
				});
            }
        });	
	})
</script>
@endsection
@endif