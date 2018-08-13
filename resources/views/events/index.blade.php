@extends('layouts.app')

@section('title', 'Events')

@section('content')
	@include('partials.breadcrumbs', [
		'background' => asset('assets/images/backgrounds/event_bg.jpg'),
		'title' => 'Events',
		'subtitle' => 'Bitcorn Foundation',
		'breadcrumb' => 'Events',
	])
	<main class="xs-main">
	    <section class="xs-content-section-padding">
	    <div class="container">
	        <div class="row">
	        	@foreach($events as $event)
	        		@include('events.partials.event')
	        	@endforeach
	        </div>
	    </div>
	</section>
    @include('partials.partners')
</main>
@endsection