@extends('layouts.app')

@section('title', 'Contact')

@section('content')
	@include('partials.breadcrumbs', [
		'background' => asset('assets/images/backgrounds/contact_bg.jpg'),
		'title' => 'Contact Us',
		'subtitle' => 'Tell us about your cause!',
		'breadcrumb' => 'Contact',
	])
	<main class="xs-main">
	    <section class="xs-contact-section-v2">
		    <div class="container">
		    	@include('partials.session')
		        <div class="xs-contact-container">
		            <div class="row">
		                <div class="col-lg-6">
		                    <div class="xs-contact-form-wraper">
		                        <h4>Drop us a line</h4>
                                @include('contact.partials.form')
		                    </div>
		                </div>
		                <div class="col-lg-6">
		                    <div class="xs-maps-wraper map-wraper-v2">
		                        <div id="xs-map" class="xs-box-shadow-2"></div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	</main>
@endsection