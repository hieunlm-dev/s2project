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
                            <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                        </li>
                    </ul>
                </div>
                <div class="topbar-menu right-menu">
                    <ul>
                        @if (session()->has('user'))
                        <li class="menu-item" ><a title="User" href="#"> Welcome <i><b>{{Session::get('user')->username}}</b></i></a></li>
                        <li class="menu-item" ><a title="Logout" href="{{route('logout')}}">Sign out</a></li>
                        @else 
                        <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                        <li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="mid-section main-info-area">

                <div class="wrap-logo-top left-section">
                    <a href="index.html" class="link-to-home"><img src="{{asset('images/logo.jpg')}}" alt="mercado"></a>
                </div>

                <div class="wrap-search center-section">
                    <div class="wrap-search-form" >
                        <form action="{{ route('search') }}" id="form-search-top" name="form-search-top" method="GET">
                            
                            <input id="search" name="search" type="text" placeholder="Search here..." />
                            <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true" ></i></button>
                            <!-- <div class="wrap-list-cate">
                                <input type="hidden" name="product-cate" value="0" id="product-cate">
                                <a href="#" class="link-control">All Category</a>
                                <ul class="list-cate">
                                    <li class="level-0">All Category</li>
                                    <li class="level-1">-Electronics</li>
                                    <li class="level-2">Batteries & Chargens</li>
                                    <li class="level-2">Headphone & Headsets</li>
                                    <li class="level-2">Mp3 Player & Acessories</li>
                                    <li class="level-1">-Smartphone & Table</li>
                                    <li class="level-2">Batteries & Chargens</li>
                                    <li class="level-2">Mp3 Player & Headphones</li>
                                    <li class="level-2">Table & Accessories</li>
                                    <li class="level-1">-Electronics</li>
                                    <li class="level-2">Batteries & Chargens</li>
                                    <li class="level-2">Headphone & Headsets</li>
                                    <li class="level-2">Mp3 Player & Acessories</li>
                                    <li class="level-1">-Smartphone & Table</li>
                                    <li class="level-2">Batteries & Chargens</li>
                                    <li class="level-2">Mp3 Player & Headphones</li>
                                    <li class="level-2">Table & Accessories</li>
                                </ul>
                            </div> -->
                        </form>
                    </div>
                </div>

                <div class="wrap-icon right-section">
                    <div class="wrap-icon-section wishlist">
                        <a href="{{ route('view-cart')}}" class="link-direction">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <div class="left-info">
                                <span class="index">0 item</span>
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
            {{-- <div class="header-nav-section">
                <div class="container">
                    <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                        <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                        <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                        <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                        <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                        <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                    </ul>
                </div>
            </div> --}}

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
                            <a href="contact-us.html" class="link-term mercado-item-title" >Contact Us</a>
                        </li>																	
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

