@extends('frontend.layout.layout')

@section('contents')
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">
            <div>
                @if (session('alert'))
                    <section class='alert alert-warning'>{{ session('alert') }}</section>
                @endif  
                @if (session('alert1'))
                    <section class='alert alert-success'>{{ session('alert1') }}</section>
                @endif  
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}" />
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            {{-- <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i> --}}
                            {{-- <a href="#" class="count-review">(05 review)</a> --}}
                        </div>
                        @if ($product->quantity == 0) <h2 style="color: red"><B>PRODUCT NOT AVAILABLE</B></h2>  @endif
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div class="short-desc">
                            <!-- <ul>
                                                        <li>7,9-inch LED-backlit, 130Gb</li>
                                                        <li>Dual-core A7 with quad-core graphics</li>
                                                        <li>FaceTime HD Camera 7.0 MP Photos</li>
                                                    </ul> -->
                        </div>
                        {{-- <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{ asset('assets/images/social-list.png') }}"
                                    alt=""></a>
                        </div> --}}
                        <div class="wrap-price"><span
                                class="product-price">{{ number_format($product->price, 0, '', '.') }}
                                ₫</span></div>
                        <div class="stock-info in-stock">
                            <p class="availability">Availability:
                                @if ($product->quantity != 0)
                                    <b>In Stock</b>
                                @else
                                    <b>Out of Stock</b>
                                @endif
                            </p>
                        </div>
                        @if ($product->quantity != 0)  
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" id="product-quantity" value="1" data-max="{{$product->quantity}}"
                                    pattern="[0-9]*">

                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                            </div>
                        </div>
                        
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart">Add to Cart</a>
                            <div class="wrap-btn">
                                <form action="{{ route('wish-list.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    <input type="submit" class="btn btn-add-to-cart" class="form-control" style="display: inline-block;
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
                                    margin-top: 14px;" value="Add To Wishlist">
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {{ $product->desc }}
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>System</th>
                                            <td class="product_weight">{{ $product->system }}</td>
                                        </tr>
                                        <tr>
                                            <th>Storage</th>
                                            <td class="product_dimensions">{{ $product->storage }}</td>
                                        </tr>
                                        <tr>
                                            <th>RAM</th>
                                            <td class="product_dimensions">{{ $product->ram }}</td>
                                        </tr>
                                        <tr>
                                            <th>Battery</th>
                                            <td class="product_weight">{{ $product->battery }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">

                                <div class="wrap-review-form">

                                    @php
                                        $count = 0;
                                    @endphp
                                    @forelse($cmts as $item)
                                        @if (isset($item))
                                            @php
                                                $count++;
                                            @endphp
                                        @endif
                                    @empty
                                        @php
                                            $count = 0;
                                        @endphp
                                    @endforelse
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">{{ $count }} review for
                                            <span>{{ $product->name }}</span>
                                        </h2>
                                        <ol class="commentlist">
                                            @forelse($cmts as $item)
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                    id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        {{-- public\assets\images\3-slide-banner-2.jpg --}}
                                                        {{-- public\assets\images\2189569-middle.png --}}
                                                        <img alt="" src="{{ asset('assets/images/2189569-middle.png') }}"
                                                            height="80" width="80">
                                                        <div class="comment-text">
                                                            @php
                                                                for ($rate = 0; $rate < $item->rate; $rate++) {
                                                                    echo '<span><i class="fa fa-star"></i></span>';
                                                                }
                                                            @endphp
                                                            <p class="meta">
                                                                <strong
                                                                    class="woocommerce-review__author">{{ $item->username }}</strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date"
                                                                    datetime="2008-02-14 20:00">{{ $item->created_at->format('d/m/Y') }}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{ $item->contents }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <p><b><i>Product has no reviews yet, please let us know what you think!</i></b></p>
                                            @endforelse
                                        </ol>
                                    </div><!-- #comments -->

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <form action="{{ route('cmt') }}" id="commentform" class="comment-form"
                                                    novalidate="">
                                                    @csrf
                                                    <input type="hidden" name="pid" value="{{ $product->id }}">
                                                    <p class="comment-notes">
                                                        <span id="email-notes"><strong>Your email address will not be
                                                            published.</span>
                                                        Required fields are marked</strong> <span style="color:red">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <span>Your rating</span>
                                                        <p class="stars">

                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating" value="1">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating" value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating" value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating" value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating" value="5"
                                                                checked="checked">
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review <span style="color:red">*</span>
                                                        </label>
                                                        <textarea id="comment" name="contents" cols="45"
                                                            rows="8" class="@error('contents') is-invalid @enderror" ></textarea>
                                                            <br>
                                                            @error('contents')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <i style="color:red">{{ $message }}</i>
                                                                </span> 
                                                            @enderror
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit"
                                                            value="Submit">
                                                    </p>
                                                </form>
                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">Free shipping in VietNam</span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Featured Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($featuredProducts as $item)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{ route('product-details', $item->id) }}"
                                                title="{{ $item->name }}">
                                                <figure><img src="{{ asset('images/' . $item->image) }}" width="214"
                                                        height="214" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product-details', $item->id) }}"
                                                class="product-name"><span>{{ $item->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ number_format($item->price, 0, '', '.') }}
                                                    ₫</span></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                            data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                            @foreach ($relatedProducts as $item)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product-details', $item->id) }}" title="{{ $item->name }}">
                                            <figure><img src="{{ asset('images/' . $item->image) }}" width="214"
                                                    height="214" alt="">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{ $item->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{ number_format($item->price, 0, '', '.') }}
                                                ₫</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!--End wrap-products-->
                </div>
            </div>

        </div>
        <!--end row-->

    </div>
    <!--end container-->

@endsection

@section('my-scripts')

    <script>
        // setup csrf-token cho post method
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.add-to-cart').click(function(e) {
            e.preventDefault(); // hủy chức năng chuyển trang của thẻ a
            quantity = $('#product-quantity').val();
            pid = {{ $product->id }}
            //alert(quantity);

            $.ajax({
                type: 'GET',
                url: '{{ route('add-cart') }}',
                data: {
                    pid: pid,
                    quantity: quantity
                },
                success: function(data) {
                    swal({
                        title: "Adding successfully",
                        text: "This product has been successfully added to your cart",
                        icon: "success",
                        button: "Okay!",
                    }).then(function() {
                        location.reload();
                    });
                    // window.location='{{ route('home') }}';   // chuyen trang bang javascript
                }
            });
        })
    </script>

@endsection
