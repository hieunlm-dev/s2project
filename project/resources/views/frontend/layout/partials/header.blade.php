<style>
    ul>li:hover>a{
    background-color: #blue;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="topbar-menu-area">
            <div class="container">
                <div class="topbar-menu left-menu">
                    <ul>
                        <li class="menu-item" >
                            <a title="Hotline" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+84) 98 157 89 20</a>
                        </li>
                    </ul>
                </div>
                <div class="topbar-menu right-menu">
                    <ul>
                        @if (session()->has('customer'))
                            <li class="menu-item" ><a title="User" href="{{route('customer.edit',session()->get('customer')->id) }}"> Welcome <i><b>{{Session::get('customer')->email}}</b></i></a></li>
                            <li class="menu-item" ><a title="Logout" href="{{route('logout')}}">Sign out</a></li>
                        @else 
                            <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                            <li class="menu-item" ><a title="Register or Login" href="{{route('customer.create')}}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="mid-section main-info-area">

                <div class="wrap-logo-top left-section">
                    <a href="{{route('home')}}" class="link-to-home"><img src="{{asset('images/logo.jpg')}}" alt="mercado"></a>
                </div>

                <div class="wrap-search center-section">
                    <div class="wrap-search-form" >
                        <form action="{{ route('search') }}" id="form-search-top" name="form-search-top" method="GET">
                            
                            <input id="search" name="search" type="text" placeholder="Search here..." />
                            <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true" ></i></button>
                        </form>
                    </div>
                </div>

                <div class="wrap-icon right-section">
                    <div class="wrap-icon-section wishlist">
                        <a href="@if(Session::has('customer')){{ route('wish-list.index')}}@else{{ route('login')}} @endif" class="link-direction">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <div class="left-info">
                                @if(isset($lists))
                                @php
                                    $count =0;
                                @endphp
                                @foreach ($lists as $item)
                                    @if (isset($item))
                                        @php
                                            $count++;
                                        @endphp
                                    @endif
                                @endforeach
                                @endif
                                <span class="index">
                                    @if(isset($lists))
                                    {{$count}} items
                                    @else 
                                    0 items
                                    @endif
                                </span>
                                <span class="title">Wishlist</span>
                            </div>
                        </a>
                    </div>
                    <div class="wrap-icon-section minicart">
                        <a href="{{route('view-cart')}}" class="link-direction">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <div class="left-info">
                                <span class="index"> 
                                @php
                                    $count = 0;
                                @endphp
                                @if (Session::has('cart'))
                                    @foreach (Session::get('cart') as $item)
                                        @if (isset($item))
                                            @php
                                                $count++;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                                @if (Session::has('cart'))
                                    {{ $count }}
                                @else
                                    0
                                @endif    
                                </span>
                                <span class="title">CART</span>
                            </div>
                        </a>
                    </div>
                    <div class="wrap-icon-section show-up-after-1024">
                        <a href="#" class="mobile-navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="nav-section header-sticky">
            <div class="primary-nav-section">
                <div class="container">
                    <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                        <li class="menu-item home-icon">
                            <a href="{{ route('home')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <li class="menu-item" >
                            <a href="{{ route('about')}}" class="link-term mercado-item-title"  >About Us</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('shop')}}" class="link-term mercado-item-title" >Shop</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('view-cart')}}" class="link-term mercado-item-title" >Cart</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('checkout')}}" class="link-term mercado-item-title" >Checkout</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('history.index')}}" class="link-term mercado-item-title" >Order History</a>
                        </li>	
                        <li class="menu-item">
                            <a href="{{route('post-index')}}" class="link-term mercado-item-title" >Blog</a>
                        </li>		
                        <li class="menu-item">
                            <a href="{{route('contact')}}" class="link-term mercado-item-title" >Contact Us</a>
                        </li>														
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

