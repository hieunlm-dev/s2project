@extends('frontend.layout.layout')

@section('contents')

<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>All Products</span></li>
        </ul>
    </div>
    <div class="well">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placekitten.com/150/150">
            </a>
            <div class="media-body">
			    @forelse ($posts as $item)
                    <h4 class="media-heading">Receta 1</h4>
                    <p class="text-right">By Francisco</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi.
                        Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.</p>
                    <ul class="list-inline list-unstyled">
                        <li><span><i class="fa fa-calendar" aria-hidden="true"></i></i> 2 days, 8 hours </span></li>
                        <li>|</li>

                        <li>
                            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                            <span><i class="fa fa-facebook-square"></i></span>
                            <span><i class="fa fa-twitter-square"></i></span>
                            <span><i class="fa fa-google-plus-square"></i></span>
                        </li>
                    </ul>
                @empty
                    <div class="product product-style-3  equal-elem">
                        <h3 align="center">Waiting for new posts</h3>
                    </div>
               @endforelse
            </div>
        </div>
    </div>
</div><!--end container-->

@endsection
