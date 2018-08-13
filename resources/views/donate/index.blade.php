@extends('layouts.app')

@section('title', 'Donate Now')
@section('description', 'Make a donation to charitable organizations and non-profit organizations that are focused on or accept cryptocurrencies, like Bitcoin.')

@section('content')
    @include('partials.breadcrumbs', [
        'background' => asset('assets/images/backgrounds/donate_bg.jpg'),
        'title' => 'Donate Now',
        'breadcrumb' => 'Donate',
    ])
    <main class="xs-main">
        @include('donate.partials.charities')
        @include('donate.partials.donations')
    </main>
@endsection