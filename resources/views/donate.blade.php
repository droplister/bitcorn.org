@extends('layouts.app')

@section('title', 'Donate')

@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/donate_bg.jpg')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Donate Now</h2>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{ url('/') }}" class="color-white"> Home /</a> Donate</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here--><!-- End welcome section -->

<main class="xs-main">
	<!-- box promo section -->
	<section class="xs-what-we-do-box">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="xs-service-promo box-color bg-light-red">
					<span class="icon-water"></span>
					<h5>The Water Project</h5>
					<p>A charity providing access to clean water in Africa. <a href="https://thewaterproject.org/" target="_blank">Learn more &raquo;</a></p>
				</div><!-- .xs-service-promo END -->
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="xs-service-promo box-color bg-green">
					<span class="icon-groceries"></span>
					<h5>Sean's Outpost</h5>
					<p>Homeless outreach program in Pensacola, FL. <a href="http://www.seansoutpost.com/" target="_blank">Learn more &raquo;</a></p>
				</div><!-- .xs-service-promo END -->
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="xs-service-promo box-color bg-blue">
					<span class="icon-heartbeat"></span>
					<h5>Cherch of Blerk</h5>
					<p>Crypto-based religion focused on disaster relief. <a href="http://cherchofblerk.com/" target="_blank">Learn more &raquo;</a></p>
				</div><!-- .xs-service-promo END -->
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="xs-service-promo box-color bg-purple">
					<span class="icon-open-book"></span>
					<h5>Internet Archive</h5>
					<p>Non-profit for saving the internet's history. <a href="https://archive.org/" target="_blank">Learn more &raquo;</a></p>
				</div><!-- .xs-service-promo END -->
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End box promo section -->

	<!-- donation form section -->
	<section class="xs-section-padding bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="xs-donation-form-images">
					<img src="assets/images/family.jpg" class="img-responsive" alt="Family Images">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="xs-donation-form-wraper" >
					<div class="xs-heading xs-mb-30">
						<h2 class="xs-title">Make a donation</h2>
						<p class="small">Obviously, this is a fake organization, but if you are feeling in a generous mood here are several charities.</p>
						<span class="xs-separetor v2"></span>
					</div><!-- .xs-heading end -->
					<form action="#" id="xs-donation-form" class="xs-donation-form">
						<div class="xs-input-group">
							<label for="xs-donate-name">Donation Amount <span class="color-light-red">**</span></label>
							<input type="text" name="name" id="xs-donate-name" class="form-control" placeholder="Minimum of $5">
						</div><!-- .xs-input-group END -->
						
						<div class="xs-input-group">
							<label for="xs-donate-charity">List of Evaluated Charities <span class="color-light-red" >**</span></label>
							<select name="charity-name" id="xs-donate-charity" class="form-control" onchange="javascript:location.href = this.value;">
								<option value="">Select</option>
								<option value="http://cherchofblerk.com/donate">Cherch of Blerk</option>
								<option value="https://coincenter.org/donate">Coin Center</option>
								<option value="https://archive.org/donate/">Internet Archive</option>
								<option value="http://www.seansoutpost.com/">Sean's Outpost</option>
								<option value="https://donate.torproject.org/pdr">Tor Project</option>
								<option value="https://thewaterproject.org/give-water">Water Project</option>
							</select>
						</div><!-- .xs-input-group END -->

						<button type="submit" class="btn btn-warning"><span class="badge"><i class="fa fa-heart"></i></span> Donate now</button>
					</form><!-- .xs-donation-form #xs-donation-form END -->
				</div>
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End donation form section -->
</main>
@endsection