@extends('frontend.layout.layout')

@section('contents')


    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div>
            @if (session('alert'))
                <section class='alert alert-warning'>{{ session('alert') }}</section>
            @endif  
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="login-form form-item form-stl">
                            <form name="frm-login" action="{{ route('process-login') }}" method="get">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Log in to your account</h3>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="text" id="frm-login-uname" name="email"
                                        placeholder="Type your email address">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Password:</label>
                                    <input type="password" id="frm-login-pass" name="password" placeholder="************">
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Login" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
                <!--end main products area-->
            </div>
        </div>
        <!--end row-->


    </div>

@endsection
