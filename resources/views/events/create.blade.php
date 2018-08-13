@extends('layouts.auth')

@section('title', 'New Event')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('partials.sidebar', ['active' => 'events'])
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Event</div>

                    <div class="card-body">
                        @include('events.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
