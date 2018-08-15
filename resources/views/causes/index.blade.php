@extends('layouts.app')

@section('title', 'Bitcorn Causes')
@section('description', 'The Bitcorn Foundation tries to help entrepreneurs, startups, and starving artists crowdfund.')

@section('content')
    @include('partials.breadcrumbs', [
        'background' => asset('assets/images/backgrounds/volunteer_bg.jpg'),
        'title' => 'Causes',
        'subtitle' => 'Lend a helping hand!',
        'breadcrumb' => 'Causes',
    ])
    <main class="xs-main">
        @include('causes.partials.categories')
        <section class="bg-gray waypoint-tigger xs-section-padding">
            <div class="container">
                <div class="xs-heading row xs-mb-60">
                    <div class="col-md-9 col-xl-9">
                        <h2 class="xs-title">Bitcorn Causes</h2>
                        <span class="xs-separetor dashed"></span>
                        <p>The Bitcorn.org platform tries to help entrepreneurs, startups, and <br> starving artists achieve their dreams.</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($active_causes as $cause)
                        @include('causes.partials.cause')
                    @endforeach
                    @foreach($ended_causes as $cause)
                        @include('causes.partials.cause')
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection