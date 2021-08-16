@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>Contact Us</span></li>
    </ul>
</div>
</div>

<div class="container">
    <div class="row">
        <div class=" main-content-area">
            <div class="wrap-contacts ">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="contact-box contact-form">
                        <h2 class="box-title">Leave a Message</h2>
                        <div>
                            @if(session('alert'))
                                <section class='alert alert-success'>{{session('alert')}}</section>
                            @endif  
                        </div>
                        <form action="{{route('save-contact')}}" method="post" name="frm-contact">
                            @csrf
                            <label for="name">Name<span>*</span></label>
                            <input type="text" value="" id="name" name="name" class="@error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="email">Email<span>*</span></label>
                            <input type="text" value="" id="email" name="email" class="@error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="phone">Number Phone</label>
                            <input type="text" value="" id="phone" name="phone" class="@error('phone') is-invalid @enderror">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <label for="phone">Subject</label>
                            <input type="text" value="" id="subject" name="subject" class="@error('subject') is-invalid @enderror">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="comment">Message</label>
                            <textarea name="message" id="message" class="textarea @error('message') is-invalid @enderror"></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <input type="submit" name="ok" value="Submit" >
                            
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="contact-box contact-info">
                        <div class="wrap-map">
                            <div class="mercado-google-maps">
                                {{-- id="az-google-maps57341d9e51968"
                                 data-hue=""
                                 data-lightness="1"
                                 data-map-style="2"
                                 data-saturation="-100"
                                 data-modify-coloring="false"
                                 data-title_maps="Kute themes"
                                 data-phone="088-465 9965 02"
                                 data-email="kutethemes@gmail.com"
                                 data-address="Z115 TP. Thai Nguyen"
                                 data-longitude="-0.120850"
                                 data-latitude="51.508742"
                                 data-pin-icon=""
                                 data-zoom="16"
                                 data-map-type="ROADMAP"
                                 data-map-height="263" --}}
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.2773997461!2d106.6662743!3d10.7868348!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd2ecb62e0d050fe9!2sFPT-Aptech%20Computer%20Education%20HCM!5e0!3m2!1sen!2shk!4v1628579062314!5m2!1sen!2shk" 
                                 width="524" height="263" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <h2 class="box-title">Contact Detail</h2>
                        <div class="wrap-icon-box">

                            <div class="icon-box-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Email</b>
                                    <p>vntuanhuynh@gmail.com</p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Phone</b>
                                    <p>070-857-1232</p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Mail Office</b>
                                    <p>Sed ut perspiciatis unde omnis<br />Street Name, Ho Chi Minh city</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--end main products area-->

    </div><!--end row-->
</div><!--end container-->

@endsection