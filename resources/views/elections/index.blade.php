@extends('layouts.app')

@section('title', 'Elections')

@section('content')
    @include('partials.breadcrumbs', [
        'background' => asset('assets/images/backgrounds/election_bg.jpg'),
        'title' => 'Elections',
        'subtitle' => 'Bitcorn Foundation',
        'breadcrumb' => 'Governance',
    ])
    <main class="xs-main">
        <section class="xs-content-section-padding">
        <div class="container">
            <div class="row">
                @foreach($events as $event)
                    @include('elections.partials.election')
                @endforeach
            </div>
        </div>
    </section>
    @include('partials.partners')
</main>
@endsection