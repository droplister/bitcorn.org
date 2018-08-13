<section class="xs-section-padding bg-gray">
	<div class="container">
		<div class="xs-heading row xs-mb-60">
			<div class="col-md-9 col-xl-9">
				<h2 class="xs-title">Our Team</h2>
				<span class="xs-separetor dashed"></span>
				<p>The Bitcorn Foundation has four board seats. The unelected Chairmain reigns eternally supreme. While the other three board seats are regularly elected by their peers.</p>
			</div>
		</div>
		<div class="row xs-mb-60">
			<div class="col-md-6 col-lg-3">
				<div class="xs-single-team">
					<img src="{{ asset('assets/images/team/team_8.png') }}" alt="Dan Anderson">
					<div class="xs-team-content">
						<h4>Dan Anderson</h4>
						<small>"Chairman"</small>
						<svg class="xs-svgs" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 270 138">
							<path class="fill-navy-blue" d="M375,3294H645v128a10,10,0,0,1-10,10l-250-20a10,10,0,0,1-10-10V3294Z" transform="translate(-375 -3294)"/>
						</svg>
					</div>
				</div>
			</div>
            @foreach($user as $user)
			<div class="col-md-6 col-lg-3">
				<div class="xs-single-team">
					<img src="{{ asset('assets/images/team/team_8.png') }}" alt="{{ $user->name }}">
					<div class="xs-team-content">
						<h4>{{ $user->name }}</h4>
						<small>"Member"</small>
						<svg class="xs-svgs" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 270 138">
							<path class="fill-navy-blue" d="M375,3294H645v128a10,10,0,0,1-10,10l-250-20a10,10,0,0,1-10-10V3294Z" transform="translate(-375 -3294)"/>
						</svg>
					</div>
				</div>
			</div>
            @endforeach
		</div>
		<div class="text-center">
			<a href="{{ route('contact.create') }}" class="btn btn-success">
				Join with us
			</a>
		</div>
	</div>
</section>