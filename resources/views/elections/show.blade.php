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
    <main class="xs-main">
        <section class="xs-content-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 xs-event-wraper">
                        @include('elections.partials.intro')
                        @include('elections.partials.tabs')
                        @include('elections.partials.platforms')
                    </div>
                    <div class="col-lg-4">
                        @include('elections.partials.sidebar')
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection