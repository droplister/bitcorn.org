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
                        @if($cause->isPending())
                            @include('causes.partials.approval')
                        @else
                            @include('causes.partials.progress')
                        @endif
                    </div>
                    <div class="col-lg-4">
                        @include('causes.sidebar')
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('causes.partials.modal')
@endsection