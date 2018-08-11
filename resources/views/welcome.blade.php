@extends('layouts.app')

@section('title', 'Bitcorn Foundation')

@section('content')
<!-- welcome section -->
<section class="xs-welcome-slider">
    <div class="xs-banner-slider owl-carousel">
        <div class="xs-welcome-content" style="background-image: url(assets/images/slider/slider_1.jpg);">
            <div class="container">
                <div class="xs-welcome-wraper color-white">
                    <h2>Dryness is a Global Problem</h2>
                    <p>Hundreds of thousands of farmers annually experience extreme dryness <br class="d-none d-md-block" /> due to a chronic lack of moisture.</p>
                    <div class="xs-btn-wraper">
                        <a href="https://bitcorns.com/" class="btn btn-outline-primary">
                            join us now
                        </a>
                        <a href="{{ url('/donate') }}" class="btn btn-primary">
                            <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
                        </a>
                    </div><!-- .xs-btn-wraper END -->
                </div><!-- .xs-welcome-wraper END -->
            </div><!-- .container end -->
            <div class="xs-black-overlay"></div>
        </div><!-- .xs-welcome-content END -->
        <div class="xs-welcome-content" style="background-image: url(assets/images/slider/slider_2.jpg);">
            <div class="container">
                <div class="xs-welcome-wraper color-white">
                    <h2>We're Funding Research</h2>
                    <p>Innovative research into cryptographically modified organisms suggests that <br class="d-none d-md-block" /> new and unprecedented yields are possible.</p>
                    <div class="xs-btn-wraper">
                        <a href="https://bitcorns.com/" class="btn btn-outline-primary">
                            join us now
                        </a>
                        <a href="{{ url('/donate') }}" class="btn btn-primary">
                            <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
                        </a>
                    </div><!-- .xs-btn-wraper END -->
                </div><!-- .xs-welcome-wraper END -->
            </div><!-- .container end -->
            <div class="xs-black-overlay"></div>
        </div><!-- .xs-welcome-content END -->
        <div class="xs-welcome-content" style="background-image: url(assets/images/slider/slider_3.jpg);">
            <div class="container">
                <div class="xs-welcome-wraper color-white">
                    <h2>Harvest Crops Worldwide</h2>
                    <p>With your help we can spread CMOs to the furthest reaches of the globe <br class="d-none d-md-block" /> and track those crops on the blockchain.</p>
                    <div class="xs-btn-wraper">
                        <a href="https://bitcorns.com/" class="btn btn-outline-primary">
                            join us now
                        </a>
                        <a href="{{ url('/donate') }}" class="btn btn-primary">
                            <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
                        </a>
                    </div><!-- .xs-btn-wraper END -->
                </div><!-- .xs-welcome-wraper END -->
            </div><!-- .container end -->
            <div class="xs-black-overlay"></div>
        </div><!-- .xs-welcome-content END -->
        <div class="xs-welcome-content" style="background-image: url(assets/images/slider/slider_4.jpg);">
            <div class="container">
                <div class="xs-welcome-wraper color-white">
                    <h2>A World Without Dryness</h2>
                    <p>We have a mission and the vision to drive out dry memes everywhere <br class="d-none d-md-block" /> and replace them with memes soaked in moistness.</p>
                    <div class="xs-btn-wraper">
                        <a href="https://bitcorns.com/" class="btn btn-outline-primary">
                            join us now
                        </a>
                        <a href="{{ url('/donate') }}" class="btn btn-primary">
                            <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
                        </a>
                    </div><!-- .xs-btn-wraper END -->
                </div><!-- .xs-welcome-wraper END -->
            </div><!-- .container end -->
            <div class="xs-black-overlay"></div>
        </div><!-- .xs-welcome-content END -->
    </div>
</section><!-- End welcome section -->

<!-- archive section -->
<section class="waypoint-tigger xs-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="xs-archive-content">
                    <div class="xs-heading">
                        <h2 class="xs-line-title">Our Mission</h2>
                        <h3 class="xs-title big" data-title="Moisture">100% Moisture</h3>
                    </div>
                    <p>We register and regulate Bitcorn cards, to ensure that the public can support moist farms with confidence. As registrar, we are responsible for maintaining accurate records.</p>
                    <h5>Our strategic priorities up to 2018 are:</h5>
                    <ul class="xs-unorder-list arrow">
                        <li>Protecting large farms from mismanagement</li>
                        <li>Enabling new cooperative missions effectively</li>
                        <li>Encouraging greater transparency and accountability</li>
                    </ul>
                    <ul class="xs-funfact-list">
                        <li>
                            <p>
                                <span class="number-percentage-count number-percentage" data-value="289" data-animation-duration="3500">0</span><sup> + </sup>
                            </p>
                            <span>Bitcorn Farms</span>
                        </li>
                        <li>
                            <p>
                                <span class="number-percentage-count number-percentage" data-value="11" data-animation-duration="3500">0</span><sup> + </sup>
                            </p>
                            <span>Cooperatives</span>
                        </li>
                        <li>
                            <p>
                                <span class="number-percentage-count number-percentage" data-value="72" data-animation-duration="3500">0</span><sup> + </sup>
                            </p>
                            <span>Certified Cards</span>
                        </li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 row xs-archive-image">
                <div class="col-md-12 xs-mb-30">
                    <img src="assets/images/archive-img-1.jpg" alt="" class="rounded">
                </div>
                <div class="col-md-6 col-sm-6">
                    <img src="assets/images/archive-img-2.jpg" alt="" class="rounded">
                </div>
                <div class="col-md-6 col-sm-6">
                    <img src="assets/images/archive-img-3.jpg" alt="" class="rounded">
                </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End archive section -->

<!-- popularCauses section -->
<section class="bg-gray waypoint-tigger xs-section-padding">
    <div class="container">
        <div class="xs-heading row xs-mb-60">
            <div class="col-md-9 col-xl-9">
                <h2 class="xs-title">Popular Causes</h2>
                <span class="xs-separetor dashed"></span>
                <p>The Bitcorn.org platform is focused on helping entrepreneurs, startups, and <br> starving artists achieve their dreams.</p>
            </div><!-- .xs-heading-title END -->
            <div class="col-xl-3 col-md-3 xs-btn-wraper">
                <a href="" class="btn btn-primary">All Causes</a>
            </div><!-- .xs-btn-wraper END -->
        </div><!-- .row end -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="assets/images/causes/causes_4.jpg" alt="">

                        <div class="xs-skill-bar">
                            <div class="xs-skill-track">
                                <p><span class="number-percentage-count number-percentage" data-value="90" data-animation-duration="3500">0</span>%</p>
                            </div>
                        </div>
                    </div><!-- .xs-item-header END -->
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-20">
                            <li><a href="">Food</a></li>
                        </ul>

                        <a href="#" class="xs-post-title xs-mb-30">Justice 4 Machine: Robots deserve corn too!</a>

                        <ul class="xs-list-with-content">
                            <li>67,000<span>Pledged</span></li>
                            <li><span class="number-percentage-count number-percentage" data-value="90" data-animation-duration="3500">0</span>% <span>Funded</span></li>
                            <li>3<span>Days to go</span></li>
                        </ul>
                                    
                        <span class="xs-separetor"></span>
                        
                        <div class="row xs-margin-0">
                            <div class="xs-round-avatar">
                                <img src="assets/images/avatar/avatar_1.jpg" alt="">
                            </div>
                            <div class="xs-avatar-title">
                                <a href="#"><span>By</span>Ema Watson</a>
                            </div>
                        </div>
                    </div><!-- .xs-item-content END -->
                </div><!-- .xs-popular-item END -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="assets/images/causes/causes_5.jpg" alt="">

                        <div class="xs-skill-bar">
                            <div class="xs-skill-track">
                                <p><span class="number-percentage-count number-percentage" data-value="59" data-animation-duration="3500">0</span>%</p>
                            </div>
                        </div>
                    </div><!-- .xs-item-header END -->
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-20">
                            <li><a href="">Health</a></li>
                        </ul>

                        <a href="#" class="xs-post-title xs-mb-30">ARX Refugee Crisis: Farmers Helping Artists</a>

                        <ul class="xs-list-with-content">
                            <li>33,600<span>Pledged</span></li>
                            <li><span class="number-percentage-count number-percentage" data-value="59" data-animation-duration="3500">0</span>% <span>Funded</span></li>
                            <li>10<span>Days to go</span></li>
                        </ul>
                        
                        <span class="xs-separetor"></span>
                        
                        <div class="row xs-margin-0">
                            <div class="xs-round-avatar">
                                <img src="assets/images/avatar/avatar_2.jpg" alt="">
                            </div>
                            <div class="xs-avatar-title">
                                <a href="#"><span>By</span>Kene Williamson</a>
                            </div>
                        </div>
                    </div><!-- .xs-item-content END -->
                </div><!-- .xs-popular-item END -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="assets/images/causes/causes_6.jpg" alt="">

                        <div class="xs-skill-bar">
                            <div class="xs-skill-track">
                                <p><span class="number-percentage-count number-percentage" data-value="35" data-animation-duration="3500">0</span>%</p>
                            </div>
                        </div>
                    </div><!-- .xs-item-header END -->
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-20">
                            <li><a href="">Education</a></li>
                        </ul>

                        <a href="#" class="xs-post-title xs-mb-30">BuildOne: $99 3D Printer w/ WiFi and Auto Bed Leveling!</a>

                        <ul class="xs-list-with-content">
                            <li>$12,760<span>Pledged</span></li>
                            <li><span class="number-percentage-count number-percentage" data-value="35" data-animation-duration="3500">0</span>% <span>Funded</span></li>
                            <li>66<span>Days to go</span></li>
                        </ul>
                        
                        <span class="xs-separetor"></span>
                        
                        <div class="row xs-margin-0">
                            <div class="xs-round-avatar">
                                <img src="assets/images/avatar/avatar_3.jpg" alt="">
                            </div>
                            <div class="xs-avatar-title">
                                <a href="#"><span>By</span>Leo Baddabes</a>
                            </div>
                        </div>
                    </div><!-- .xs-item-content END -->
                </div><!-- .xs-popular-item END -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="assets/images/causes/causes_7.jpg" alt="">

                        <div class="xs-skill-bar">
                            <div class="xs-skill-track">
                                <p><span class="number-percentage-count number-percentage" data-value="85" data-animation-duration="3500">0</span>%</p>
                            </div>
                        </div>
                    </div><!-- .xs-item-header END -->
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-20">
                            <li><a href="">Charity</a></li>
                        </ul>

                        <a href="#" class="xs-post-title xs-mb-30">DACBerry PRO – Professional Soundcard for Raspberry Pi</a>

                        <ul class="xs-list-with-content">
                            <li>$99,980<span>Pledged</span></li>
                            <li><span class="number-percentage-count number-percentage" data-value="85" data-animation-duration="3500">0</span>% <span>Funded</span></li>
                            <li>2<span>Days to go</span></li>
                        </ul>
                        
                        <span class="xs-separetor"></span>
                        
                        <div class="row xs-margin-0">
                            <div class="xs-round-avatar">
                                <img src="assets/images/avatar/avatar_4.jpg" alt="">
                            </div>
                            <div class="xs-avatar-title">
                                <a href="#"><span>By</span>Jhung Li</a>
                            </div>
                        </div>
                    </div><!-- .xs-item-content END -->
                </div><!-- .xs-popular-item END -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="assets/images/causes/causes_8.jpg" alt="">

                        <div class="xs-skill-bar">
                            <div class="xs-skill-track">
                                <p><span class="number-percentage-count number-percentage" data-value="74" data-animation-duration="3500">0</span>%</p>
                            </div>
                        </div>
                    </div><!-- .xs-item-header END -->
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-20">
                            <li><a href="">Cave</a></li>
                        </ul>

                        <a href="#" class="xs-post-title xs-mb-30">BIKI: First Bionic Wireless Under water Fish Drone</a>

                        <ul class="xs-list-with-content">
                            <li>$40,000<span>Pledged</span></li>
                            <li><span class="number-percentage-count number-percentage" data-value="74" data-animation-duration="3500">0</span>% <span>Funded</span></li>
                            <li>70<span>Days to go</span></li>
                        </ul>
                        
                        <span class="xs-separetor"></span>
                        
                        <div class="row xs-margin-0">
                            <div class="xs-round-avatar">
                                <img src="assets/images/avatar/avatar_5.jpg" alt="">
                            </div>
                            <div class="xs-avatar-title">
                                <a href="#"><span>By</span>Chirstina Perry</a>
                            </div>
                        </div>
                    </div><!-- .xs-item-content END -->
                </div><!-- .xs-popular-item END -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="assets/images/causes/causes_11.jpg" alt="">

                        <div class="xs-skill-bar">
                            <div class="xs-skill-track">
                                <p><span class="number-percentage-count number-percentage" data-value="89" data-animation-duration="3500">0</span>%</p>
                            </div>
                        </div>
                    </div><!-- .xs-item-header END -->
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-20">
                            <li><a href="">Watar</a></li>
                        </ul>

                        <a href="#" class="xs-post-title xs-mb-30">Brilliant After All, A New Album by Rebecca: Help poor people</a>

                        <ul class="xs-list-with-content">
                            <li>$98,980<span>Pledged</span></li>
                            <li><span class="number-percentage-count number-percentage" data-value="89" data-animation-duration="3500">0</span>% <span>Funded</span></li>
                            <li>2<span>Days to go</span></li>
                        </ul>
                        
                        <span class="xs-separetor"></span>
                        
                        <div class="row xs-margin-0">
                            <div class="xs-round-avatar">
                                <img src="assets/images/avatar/avatar_6.jpg" alt="">
                            </div>
                            <div class="xs-avatar-title">
                                <a href="#"><span>By</span>Prekina William</a>
                            </div>
                        </div>
                    </div><!-- .xs-item-content END -->
                </div><!-- .xs-popular-item END -->
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End popularCauses section -->

<!-- text with image section -->
<section class="xs-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="xs-text-content xs-pr-20">
                    <h2 class="color-navy-blue">The Bitcorn Foundation offers real solutions</h2>
                    <p>The Bitcorn Foundation and its community of humble farmers were named "Top 25 Best Global Blockchain Foundation" by Forbes. We beat Oprah. And, Mashable named the Bitcorn Foundation, "the only organization dedicated to erdicating dryness in our lifetime."</p>
                    <blockquote>
                        I've never seen anything like the energy the Bitcorn Foundation and its board members bring to these often over looked issues. <span>John D. Rockefeller</span>
                    </blockquote>
                    <a href="{{ url('/donate') }}" class="btn btn-primary">
                        <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
                    </a>
                </div><!-- .xs-text-content END -->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="xs-feature-image">
                    <img src="assets/images/features_1.jpg" alt="">
                </div><!-- .xs-feature-image END -->
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="xs-feature-image">
                    <img src="assets/images/features_2.jpg" alt="">
                </div><!-- .xs-feature-image END -->
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End text with image section -->

<!-- become a volunteer section -->
<section class="parallax-window xs-become-a-volunteer xs-section-padding" style="background-image: url('assets/images/backgrounds/volunteer-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-7">
                <div class="xs-volunteer-form-wraper bg-aqua">
                    <h2>Become a Volunteer</h2>
                    <p>It only takes a minute to makes a difference. We're a totally legit, world-class organization that's not going to stop until the world is moist.</p>
                    <form action="#" method="POST" id="volunteer-form" class="xs-volunteer-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" id="volunteer_name" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" id="volunteer_email" class="form-control" placeholder="Your Email">
                            </div>
                        </div><!-- .row end -->
                        <textarea name="massage" id="massage" placeholder="Enter your massage" cols="30" class="form-control" rows="10"></textarea>
                        <button type="submit" class="btn btn-secondary btn-color-alt">apply now</button>
                    </form><!-- #volunteer-form .xs-volunteer-form END -->
                </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End become a volunteer section -->

<!-- events section -->
<section class="xs-section-padding">
    <div class="container">
        <div class="xs-heading row xs-mb-60">
            <div class="col-md-9 col-xl-9">
                <h2 class="xs-title">Our Events</h2>
                <span class="xs-separetor dashed"></span>
                <p>FundPress has built a platform focused on aiding entrepreneurs, startups, and <br> companies raise capital from anyone.</p>
            </div><!-- .xs-heading-title END -->
        </div>
        <div class="row">
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_1.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">27</span>
                            <span class="entry-date-month">dec</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="#">Raspberry velbet</a>
                        <p>In a time of overwhelming emotions, sadness, and pain, obligations.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/01/24"></div>
                        <a href="#" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_2.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">15</span>
                            <span class="entry-date-month">aug</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="#">Arsenal, the intelligent.</a>
                        <p>In a time of overwhelming emotions, sadness, and pain, obligations.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/08/24"></div>
                        <a href="#" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_3.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">24</span>
                            <span class="entry-date-month">jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="#">Waterproof drone that</a>
                        <p>In a time of overwhelming emotions, sadness, and pain, obligations.</p>
                        <div class="xs-countdown-timer" data-countdown="2019/05/24"></div>
                        <a href="#" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_4.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">23</span>
                            <span class="entry-date-month">jun</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="">Braille Literacy Tool for.</a>
                        <p>In a time of overwhelming emotions, sadness, and pain, obligations.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/02/24"></div>
                        <a href="#" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End events section -->

    @include('partials.partners')

@endsection