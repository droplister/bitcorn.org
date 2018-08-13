@extends('layouts.app')

@section('title', 'About')

@section('content')
	@include('partials.breadcrumbs', [
		'background' => asset('assets/images/backgrounds/about_bg.jpg'),
		'title' => 'About Us',
		'subtitle' => 'The Bitcorn Foundation',
		'breadcrumb' => 'About',
	])
	<main class="xs-main">
		@include('about.partials.video')
		@include('about.partials.mission')
		@include('about.partials.facts')
    	@include('partials.partners')
	</main>
@endsection