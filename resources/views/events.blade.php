@extends('layouts.app')

@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/event_bg.jpg')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Events</h2>
			<p>Give a helping hand for poor people</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="index.html" class="color-white"> Home /</a> Events</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here--><!-- End welcome section -->


<main class="xs-main">
	<!-- video popup section section -->
	<section class="xs-content-section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 row xs-single-event event-green">
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
			<div class="col-lg-6 row xs-single-event event-purple">
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
			<div class="col-lg-6 row xs-single-event event-red">
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
			<div class="col-lg-6 row xs-single-event event-blue">
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
</section>	<!-- End video popup section section -->

	<!-- partners section -->
	<section class="bg-gray xs-partner-section" style="background-image: url('assets/images/map.png');">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="xs-partner-content">
					<div class="xs-heading xs-mb-40">
						<h2 class="xs-mb-0 xs-title">Trusted by the biggest <span class="color-green">brand.</span></h2>
					</div>
					<p>In-kind donations from our donors and partners allow charity: water to pass 100% of public donations straight to water projects. We are deeply grateful for those who have surprised us with their generosity. A big thanks to the following companies and people who have helped make charity: water’s work possible.</p>
					<a href="#" class="btn btn-primary bg-orange">
						join us now
					</a>
				</div>
			</div>
			<div class="col-lg-7">
				<ul class="fundpress-partners">
					<li><a href="#"><img src="assets/images/partner/client_1.png" alt=""></a></li>
					<li><a href="#"><img src="assets/images/partner/client_2.png" alt=""></a></li>
					<li><a href="#"><img src="assets/images/partner/client_3.png" alt=""></a></li>
					<li><a href="#"><img src="assets/images/partner/client_4.png" alt=""></a></li>
					<li><a href="#"><img src="assets/images/partner/client_5.png" alt=""></a></li>
				</ul>
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End partners section -->
</main>
@endsection