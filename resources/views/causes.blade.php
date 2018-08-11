@extends('layouts.app')

@section('title', 'Causes')

@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/volunteer_bg.jpg')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Causes</h2>
			<p>Give a helping hand for poor people</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{ url('/') }}" class="color-white"> Home /</a> Causes</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here--><!-- End welcome section -->


<main class="xs-main">
	<!-- causes section -->
	<section class="xs-content-section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="xs-single-causes">
					<img src="assets/images/causes/causes_1.jpg" alt="">
					<div class="xs-causes-footer">
						<h2 class="color-light-red">Food</h2>
						<p>In Balukhali Camp in Cox’s Bazar, Bangladesh, women lack privacy, safe places to sleep, sufficient sanitation facilities and mental health support.</p>
					</div>
				</div><!-- .xs-single-causes END -->
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="xs-single-causes">
					<img src="assets/images/causes/causes_2.jpg" alt="">
					<div class="xs-causes-footer">
						<h2 class="color-purple">Health</h2>
						<p>663 million people drink dirty water. Learn how access to clean water can improve health, boost local economies, empower give kids more time in school.</p>
					</div>
				</div><!-- .xs-single-causes END -->
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="xs-single-causes">
					<img src="assets/images/causes/causes_3.jpg" alt="">
					<div class="xs-causes-footer">
						<h2 class="color-blue">Education</h2>
						<p>For $10,000 or more you can fully fund a water project for a community or a school. 100% funds clean water projects. Ask for donations instead of gifts.</p>
					</div>
				</div><!-- .xs-single-causes END -->
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="xs-single-causes">
					<img src="assets/images/causes/causes_4.jpg" alt="">
					<div class="xs-causes-footer">
						<h2 class="color-purple">Water</h2>
						<p>In Balukhali Camp in Cox’s Bazar, Bangladesh, women lack privacy, safe places to sleep, sufficient sanitation facilities and mental health support.</p>
					</div>
				</div><!-- .xs-single-causes END -->
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="xs-single-causes">
					<img src="assets/images/causes/causes_5.jpg" alt="">
					<div class="xs-causes-footer">
						<h2 class="color-yellow">Cave</h2>
						<p>663 million people drink dirty water. Learn how access to clean water can improve health, boost local economies, empower give kids more time in school.</p>
					</div>
				</div><!-- .xs-single-causes END -->
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="xs-single-causes">
					<img src="assets/images/causes/causes_6.jpg" alt="">
					<div class="xs-causes-footer">
						<h2 class="color-burntOrange">Funding</h2>
						<p>For $10,000 or more you can fully fund a water project for a community or a school. 100% funds clean water projects. Ask for donations instead of gifts.</p>
					</div>
				</div><!-- .xs-single-causes END -->
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End causes section -->

	<!-- popularCauses version 2 section -->
	<section class="bg-gray waypoint-tigger xs-section-padding">
	<div class="container">
		<div class="xs-heading row xs-mb-60">
			<div class="col-md-9 col-xl-9">
				<h2 class="xs-title">Popular Causes</h2>
				<span class="xs-separetor dashed"></span>
				<p>FundPress has built a platform focused on aiding entrepreneurs, startups, and <br> companies raise capital from anyone.</p>
			</div><!-- .xs-heading-title END -->
			<div class="col-xl-3 col-md-3 xs-btn-wraper">
				<a href="" class="btn btn-primary bg-orange">all Causes</a>
			</div><!-- .xs-btn-wraper END -->
		</div><!-- .row end -->
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="xs-popular-item xs-box-shadow">
					<div class="xs-item-header">

						<img src="assets/images/causes/causes_4.jpg" alt="">

						<div class="xs-skill-bar">
							<div class="xs-skill-track bg-light-red">
								<p><span class="number-percentage-count number-percentage" data-value="90" data-animation-duration="3500">0</span>%</p>
							</div>
						</div>
					</div><!-- .xs-item-header END -->
					<div class="xs-item-content">
						<ul class="xs-simple-tag xs-mb-20">
							<li><a class="color-light-red" href="">Food</a></li>
						</ul>

						<a href="#" class="xs-post-title xs-mb-30">Splash Drone 3 a Fully Waterproof Drone that floats</a>

						<ul class="xs-list-with-content">
							<li>$67,000<span>Pledged</span></li>
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
							<div class="xs-skill-track bg-purple">
								<p><span class="number-percentage-count number-percentage" data-value="59" data-animation-duration="3500">0</span>%</p>
							</div>
						</div>
					</div><!-- .xs-item-header END -->
					<div class="xs-item-content">
						<ul class="xs-simple-tag xs-mb-20">
							<li><a class="color-purple" href="">Health</a></li>
						</ul>

						<a href="#" class="xs-post-title xs-mb-30">The Read Read: Braille Literacy Tool for the Blind</a>

						<ul class="xs-list-with-content">
							<li>$33,600<span>Pledged</span></li>
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
							<div class="xs-skill-track bg-blue">
								<p><span class="number-percentage-count number-percentage" data-value="35" data-animation-duration="3500">0</span>%</p>
							</div>
						</div>
					</div><!-- .xs-item-header END -->
					<div class="xs-item-content">
						<ul class="xs-simple-tag xs-mb-20">
							<li><a class="color-blue" href="">Education</a></li>
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
							<div class="xs-skill-track bg-burntOrange">
								<p><span class="number-percentage-count number-percentage" data-value="85" data-animation-duration="3500">0</span>%</p>
							</div>
						</div>
					</div><!-- .xs-item-header END -->
					<div class="xs-item-content">
						<ul class="xs-simple-tag xs-mb-20">
							<li><a class="color-burntOrange" href="">Charity</a></li>
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
							<div class="xs-skill-track bg-riptide">
								<p><span class="number-percentage-count number-percentage" data-value="74" data-animation-duration="3500">0</span>%</p>
							</div>
						</div>
					</div><!-- .xs-item-header END -->
					<div class="xs-item-content">
						<ul class="xs-simple-tag xs-mb-20">
							<li><a class="color-riptide" href="">Cave</a></li>
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
							<div class="xs-skill-track bg-orange">
								<p><span class="number-percentage-count number-percentage" data-value="89" data-animation-duration="3500">0</span>%</p>
							</div>
						</div>
					</div><!-- .xs-item-header END -->
					<div class="xs-item-content">
						<ul class="xs-simple-tag xs-mb-20">
							<li><a class="color-orange" href="">Watar</a></li>
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
</section>	<!-- End popularCauses version 2 section -->
</main>
@endsection