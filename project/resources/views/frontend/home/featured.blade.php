<h3 class="title-box">Featured Products</h3>
<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

    @foreach($featuredProducts as $item)
    <div class="product product-style-2 equal-elem " >
        <div class="product-thumnail">
            <a href="{{route('product-details',$item->id)}}" title="{{$item->name}}">
                <figure><img src="{{asset('images/'.$item->image)}}" style="width: 213px; height:142px;" alt="{{$item->name}}"></figure>
            </a>
            <div class="group-flash">
                <span class="flash-item sale-label">hot</span>
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
