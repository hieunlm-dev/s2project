@extends('frontend.layout.layout')

@section('contents')

    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Blog Post</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="row">
                    <form action="#">
						<div class="wrap-shop-control">	

						<h1 class="shop-title">Blog Post</h1>
                        <div class="wrap-right">
							{{-- <button type="submit" class="btn btn-primary" method="GET" >Sort product</button> --}}
							<div class="sort-item orderby ">
								<select name="orderby" class="use-chosen" onchange="this.form.submit()">
									<option value="1" >Categories</option>
                                    {{-- @foreach ($categories as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach --}}
								</select>
							</div>
						</div>

						
					</div><!--end wrap shop control-->
					</form>
                    <ul class="product-list grid-products equal-container" id="id01">
                        @forelse ($posts as $item)
                            {{-- @php                             
                                dd($item->created_at->format('d/m/Y'));
                            @endphp --}}
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail" style="display:flex;justify-content:center">
                                        <a href="{{ route('post-detail', $item->id) }}" title="{{ $item->name }}">
                                            <figure><img src="{{ asset('images/' . $item->image) }}"
                                                    style="width: auto; height:166px;" alt="img"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <div style="display:flex;justify-content:center" ><a href="{{ route('post-detail', $item->id) }}" class="product-name" ><span> <b>{{ $item->title }} </b></span></a></div>
                                        <div class="wrap-price" style="text-align: right"><span  > By <i>{{$item->author}} </i></span>
                                        <div class="wrap-price" style="text-align: right"><span>Post day: {{ $item->created_at -> format('d/m/Y')}} </span>

                                        </div>

                                        <a href="{{ route('post-detail', $item->id) }}" class="btn add-to-cart">Read more</a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="product product-style-3  equal-elem">
                                <h3 align="left">Waiting for new post </h3>
                            </div>
                        @endforelse
                    </ul>
                </div>
                <div class="wrap-pagination-info">
                    <div class="d-flex justify-content-center">
                        {!!$products->appends(request()->input())->links()!!}
                    
                    </div>
                </div>
            </div>
            <!--end main products area-->
        </div>
    </div>
    <!--end container-->

@endsection
