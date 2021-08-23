@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>Contact us</span></li>
    </ul>
</div>
</div>

<div class="container">
<!-- <div class="main-content-area"> -->
    <div class="aboutus-info style-center">
        <b class="box-title">Interesting Facts</b>
        <p class="txt-content">This is just a project done by 4 students of a college within 1-2 months</p>
    </div>

    <div class="row equal-container">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="aboutus-box-score equal-elem ">
                <b class="box-score-title">variety</b>
                <span class="sub-title">Items in Store are VARIETY</span>
                <p class="desc">The products at 2HAT are completely imported from major countries such as the United States, Korea, ...</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="aboutus-box-score equal-elem ">
                <b class="box-score-title">100%</b>
                <span class="sub-title">genuine</span>
                <p class="desc">Our products are 100% genuine from the Internet and Photoshop</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="aboutus-box-score equal-elem ">
                <b class="box-score-title">2 million</b>
                <span class="sub-title">User of the site</span>
                <p class="desc">That is our goal when we have a complete website later on!</p>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="aboutus-info style-small-left">
                <b class="box-title">What we are doing here?</b>
                <p class="txt-content">Actually, we are practicing to make a sales website in the most complete way, we are learning and developing ourselves better in this internship.</p>
            </div>
            <div class="aboutus-info style-small-left">
                <b class="box-title">development time of the site</b>
                <p class="txt-content">We started planning and looking for sample sites, the process didn't take too long, we quickly divided the work and got to work but the first step of this site and now it's complete.</p>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="aboutus-info style-small-left">
                <b class="box-title">Our Vision</b>
                <p class="txt-content">We aim for a modern and minimalist website that is accessible to customers.</p>
            </div>
            <div class="aboutus-info style-small-left">
                <b class="box-title">Please support us!</b>
                <p class="txt-content">This is just the beginning of us, although there will be many mistakes, but we hope you will accept it in a civilized way. We will develop more and more to bring you a better quality product. Thanks everyone!</p>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="aboutus-info style-small-left">
                <b class="box-title">Cooperate with Us!</b>
                <div class="list-showups">
                    <label>
                        <input type="radio" class="hidden" name="showup" id="shoup1" value="shoup1" checked="checked">
                        <span class="check-box"></span>
                        <span class='function-name'>Support 24/7</span>
                        <span class="desc">Support staff at 2HAT will work 24/7 to best support customers who have or have not purchased at 2HAT</span>                      
                    </label>
                    <label>
                        <input type="radio" class="hidden" name="showup" id="shoup2" value="shoup2">
                        <span class="check-box"></span>
                        <span class='function-name'>Best Quanlity</span>
                        <span class="desc">The best quality from services and products from 2HATStore</span>
                    </label>
                    <label>
                        <input type="radio" class="hidden" name="showup" id="shoup3" value="shoup3">
                        <span class="check-box"></span>
                        <span class='function-name'>Fastest Delivery</span>
                        <span class="desc">fast delivery from 3-5 days for customers ordering in other provinces in the country</span>
                    </label>
                    <label>
                        <input type="radio" class="hidden" name="showup" id="shoup4" value="shoup4">
                        <span class="check-box"></span>
                        <span class='function-name'>Customer Care</span>
                        <span class="desc">Customer care services from 2HAT always put the interests of customers first to bring customers the best quality.</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="our-team-info">
        <h4 class="title-box">Our teams</h4>
        <div class="our-staff">
            <div 
                class="slide-carousel owl-carousel style-nav-1 equal-container" 
                data-items="5" 
                data-loop="false" 
                data-nav="true" 
                data-dots="false"
                data-margin="30"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"}}' >

                <div class="team-member equal-elem">
                    <div class="media">
                        <a href="#" title="LEONA">
                            <figure><img src="assets/images/member-lucia.jpg" alt="LUCIA"></figure>
                        </a>
                    </div>
                    <div class="info">
                        <b class="name">Hieu Nguyen</b>
                        <span class="title">Director</span>
                        <p class="desc">Managing director of all branches of the company.</p>
                    </div>
                </div>

                <div class="team-member equal-elem">
                    <div class="media">
                        <a href="#" title="LUCIA">
                            <figure><img src="assets/images/member-leona.jpg" alt="LEONA"></figure>
                        </a>
                    </div>
                    <div class="info">
                        <b class="name">An Nguyen</b>
                        <span class="title">Manager</span>
                        <p class="desc">Managing all projects of company</p>
                    </div>
                </div>

                <div class="team-member equal-elem">
                    <div class="media">
                        <a href="#" title="NANA">
                            <figure><img src="assets/images/member-nana.jpg" alt="NANA"></figure>
                        </a>
                    </div>
                    <div class="info">
                        <b class="name">Hien Nguyen</b>
                        <span class="title">Marketer</span>
                        <p class="desc">Working with other social companies to promote for company</p>
                    </div>
                </div>

                <div class="team-member equal-elem">
                    <div class="media">
                        <a href="#" title="BRAUM">
                            <figure><img src="assets/images/member-braum.jpg" alt="BRAUM"></figure>
                        </a>
                    </div>
                    <div class="info">
                        <b class="name">Tuan Huynh</b>
                        <span class="title">Member</span>
                        <p class="desc">Labour is honour!</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
<!-- </div> -->


</div><!--end container-->

@endsection