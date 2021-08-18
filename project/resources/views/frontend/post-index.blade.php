@extends('frontend.layout.layout')

@section('contents')

    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Blog Post</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="row">
                    <ul class="product-list grid-products equal-container" id="id01">
                        @forelse ($posts as $item)
                            @php                             
                                dd($item->created_at->format('d/m/Y'));
                            @endphp
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product-details', $item->id) }}" title="{{ $item->name }}">
                                            <figure><img src="{{ asset('images/' . $item->image) }}"
                                                    style="width: auto; height:166px;" alt="img"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{ $item->title }}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{ $item->author }} </span>
                                        </div>

                                        <a href="#" class="btn add-to-cart">Read more</a>
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

            </div>
            <!--end main products area-->
        </div>
    </div>
    <!--end container-->

@endsection
