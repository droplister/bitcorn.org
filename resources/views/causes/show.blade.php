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
                <div class="d-sm-none">
                    @if(! $cause->isPending())
                        @include('causes.partials.progress')
                    @endif
                    <div class="xs-event-schedule-widget mb-5">
                        <div class="media xs-event-schedule">
                            <div class="media-body">
                                <h5>Seeking {{ number_format($cause->target_normalized) }} {{ $cause->asset->display_name }}</h5>
                            </div>
                        </div>
                        <ul class="list-group xs-list-group">
                            <li class="d-flex justify-content-between">
                                Total Raised: 
                                <span>{{ number_format($cause->pledged_normalized) }} {{ $cause->asset->display_name }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                Released On: 
                                <span>{{ $cause->ended_at->format('F j') }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                Pledge Code: 
                                <span>{{ $cause->memo }}</span>
                            </li>
                        </ul>
                        @if(! $cause->hasEnded())
                        <button type="button" class="btn btn-block btn-primary mt-5" data-toggle="modal" data-target="#pledgeModalCenter">
                            Pledge {{ $cause->asset->display_name }}
                        </button>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        @include('causes.partials.content')
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