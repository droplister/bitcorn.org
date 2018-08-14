@extends('layouts.app')

@section('title', $election->event->name)
@section('description', $election->event->description)

@section('content')
    @include('partials.breadcrumbs', [
        'background' => asset('assets/images/backgrounds/election_bg.jpg'),
        'title' => $election->event->name,
        'subtitle' => 'Get out the vote!',
        'breadcrumb' => 'Election',
    ])
@endsection