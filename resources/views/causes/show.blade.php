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
        <!-- event single section -->
        <section class="xs-content-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-8 xs-event-wraper">
                            <div class="xs-event-content">
                                @markdown($cause->content)
                            </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>
                </div>
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section>  <!-- End event single section -->
    </main>
@endsection