@extends('frontend.layout.layout')

@section('contents')

<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('home')}}" class="link">Home</a></li>
					<li class="item-link"><span>Shop</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="{{asset('assets/images/samsung.jpg')}}" alt="" width="100%" height="190"></figure>
						</a>
					</div>

					<div class="wrap-shop-control">

						<h1 class="shop-title">Shop</h1>

						{{-- <div class="wrap-right">

							<div class="sort-item orderby ">
								<select name="orderby" class="use-chosen" >
									<option value="menu_order" selected="selected">Default sorting</option>
									<option value="popularity">Sort by popularity</option>
									<option value="rating">Sort by average rating</option>
									<option value="date">Sort by newness</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
							</div>


							

						</div> --}}

					</div><!--end wrap shop control-->

					<div class="row">
						<ul class="product-list grid-products equal-container">
                            <!-- @if($products->isNotEmpty()) -->
                            @foreach($products as $item)
							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="{{route('product-details',$item->id)}}" title="{{$item->name}}">
											<figure><img src="{{asset('images/'.$item->image)}}" alt="img"></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="{{route('product-details',$item->id)}}" class="product-name"><span>{{$item->name}}</span></a>
										<div class="wrap-price"><span class="product-price">{{ number_format($item->price, 0, '', '.') }} ₫</span></div>
										
									</div>
								</div>
							</li>

                            @endforeach
                            <!-- @else 
                            <div>
                                <h2>No posts found</h2>
                            </div>
                            @endif -->
						</ul>

					</div>
					<div class="wrap-pagination-info">
						<div class="d-flex justify-content-center">
							{!! $products->links() !!}
						</div>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

@endsection