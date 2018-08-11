@extends('layouts.app')

@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/about_bg.jpg')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>About Us</h2>
			<p>The Bitcorn Foundation</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{ url('/') }}" class="color-white"> Home /</a> About</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here--><!-- End welcome section -->


<main class="xs-main">
	<!-- video popup section section -->
	<div class="xs-video-popup-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 content-center">
				<div class="xs-video-popup-wraper">
					<img src="assets/images/video_img.jpg" alt="">
					<div class="xs-video-popup-content">
						<a href="https://www.youtube.com/watch?v=sF9Pzu7GqZE" class="xs-video-popup xs-round-btn">
							<i class="fa fa-play"></i>
						</a>
					</div><!-- .xs-video-popup-content end -->
				</div><!-- .xs-video-popup-wraper end -->
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</div>	<!-- End video popup section section -->

	<!-- video popup section section -->
	<section class="xs-content-section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-11 content-center">
				<div class="xs-heading xs-mb-100 text-center">
					<h2 class="xs-mb-0 xs-title">We are a decentralized Bitcorn organization that <span class="color-green">supports</span> good causes and positive memes all over the world.</h2>
				</div>
			</div>
		</div><!-- .row end -->
		<div class="row">
			<div class="col-md-4">
				<div class="xs-about-feature">
					<h3>Our Mission</h3>
					<p class="lead">The Bitcorn Foundation exists to eradicate extreme dryness. We owe it to our children to irrigate the future today.</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="xs-about-feature">
					<h3>Our Vission</h3>
					<p class="lead">Holistically implement real blockchain solutions that can bring moisture to all farms globally by the year 2022.</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="xs-about-feature">
					<h3>Our Values</h3>
					<ul class="xs-unorder-list play green-icon">
						<li>Alpha bids</li>
						<li>Reliable memes</li>
						<li>Vaporwave aestetic</li>
					</ul>
				</div>
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End video popup section section -->

	<!-- funfacts section -->
	<div class="xs-funfact-section xs-content-section-padding waypoint-tigger parallax-window" style="background-image: url('assets/images/backgrounds/parallax_1.jpg')">
	<div class="container">
		<div class="row col-lg-10 xs-heading mx-auto">
			<h2 class="xs-title color-white small">Our foundation was founded in 2018 and we're only just getting started.</h2>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="xs-single-funFact color-white">
					<i class="icon-donation_2"></i>
					<span class="number-percentage-count number-percentage" data-value="10" data-animation-duration="3500">0</span><span>M</span>
					<small>BITCORN</small>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="xs-single-funFact color-white">
					<i class="icon-group"></i>
					<span class="number-percentage-count number-percentage" data-value="25" data-animation-duration="3500">0</span><span>k</span>
					<small>Farmers</small>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="xs-single-funFact color-white">
					<i class="icon-children"></i>
					<span class="number-percentage-count number-percentage" data-value="30" data-animation-duration="3500">0</span><span>k</span>
					<small>Co-Ops</small>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="xs-single-funFact color-white">
					<i class="icon-planet-earth"></i>
					<span class="number-percentage-count number-percentage" data-value="14" data-animation-duration="3500">0</span><span>k</span>
					<small>Places</small>
				</div>
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
	<div class="xs-black-overlay"></div>
</div>	<!-- End funfacts section -->

	<!-- partners section -->
	<section class="xs-partner-section" style="background-image: url('assets/images/map.png');">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="xs-partner-content">
					<div class="xs-heading xs-mb-40">
						<h2 class="xs-mb-0 xs-title">Built on the best <span class="color-green">blockchain.</span></h2>
					</div>
					<p>We are deeply grateful for those who have created the Bitcoin blockchain, as well as, those who developed Counterparty. A big thanks to the following companies and projects who have helped make the Bitcorn Foundation's work possible.</p>
					<a href="{{ url('/contact') }}" class="btn btn-primary bg-orange">
						join us now
					</a>
				</div>
			</div>
			<div class="col-lg-7">
				<ul class="fundpress-partners">
					<li><a href="https://btcinformation.org/"><img src="assets/images/partner/client_1.png" alt=""></a></li>
					<li><a href="https://counterparty.io/"><img src="assets/images/partner/client_2.png" alt=""></a></li>
					<li><a href="https://bitcorns.com/"><img src="assets/images/partner/client_3.png" alt=""></a></li>
					<li><a href="http://rarepepefoundation.com/"><img src="assets/images/partner/client_4.png" alt=""></a></li>
					<li><a href="https://xcpfox.com/"><img src="assets/images/partner/client_5.png" alt=""></a></li>
				</ul>
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End partners section -->
</main>
@endsection