@extends('layouts.app')

@section('title', 'About Us')
@section('description', 'The Bitcorn Foundation exists to eradicate extreme dryness. We owe it to our children to irrigate the future today.')

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
        @include('about.partials.what')
        @include('about.partials.team')
        @include('partials.partners')
    </main>
@endsection