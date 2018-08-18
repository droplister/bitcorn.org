@extends('layouts.app')

@section('title', $cause->name)

@section('content')
    @include('partials.breadcrumbs', [
        'background' => asset('assets/images/backgrounds/volunteer_bg.jpg'),
        'title' => $cause->title,
        'subtitle' => $cause->subtitle,
        'breadcrumb' => 'Causes',
    ])
    <main class="xs-main">
        <section class="xs-content-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @include('causes.partials.content')
                        @include('causes.partials.progress')
                    </div>
                    <div class="col-lg-4">
                        @include('causes.partials.sidebar')
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('causes.partials.modal')
@endsection