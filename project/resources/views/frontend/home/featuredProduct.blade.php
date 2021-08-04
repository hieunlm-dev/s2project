<h3 class="title-box">Featured Product</h3>
<div class="wrap-top-banner">
	<a href="#" class="link-banner banner-effect-2">
		<figure><img src="{{asset('assets/images/featured.jpg')}}" width="1170" height="200" alt=""></figure>
	</a>
</div>
<div class="wrap-products">
	<div class="wrap-product-tab tab-style-1">						
		<div class="tab-contents">
			<div class="tab-content-item active" id="digital_1a">
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
					@foreach($featuredProducts as $item)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{route('product-details',$item->id)}}" title="{{$item->name}}">
								<figure><img src="{{asset('images/'. $item->image)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="{{route('product-details',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
							<div class="wrap-price"><span class="product-price">{{ number_format($item->price,0,'','.')}} ₫</span></div>
						</div>
					</div>
					@endforeach
				</div>
			</div>							
		</div>
	</div>
</div>