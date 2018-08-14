@extends('layouts.app')

@section('title', 'Bitcorn Foundation')
@section('description', 'The Bitcorn Foundation is a forward memeing organization that exists only in the hearts and minds of bitcorners. It was founded to eradicate extreme dryness globally.')

@section('content')
    @include('home.partials.slider')
    @include('home.partials.mission')
    @include('home.partials.causes')
    @include('home.partials.feature')
    @include('home.partials.contact')
    @include('home.partials.events')
    @include('partials.partners')
@endsection