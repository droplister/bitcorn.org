@extends('layouts.auth')

@section('title', 'New Cause')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            <a href="{{ route('causes.index') }}"><i class="fa fa-heart"></i></a>
            New Cause
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('dashboard.sidebar', ['active' => 'cause'])
            </div>
            <div class="col-md-8">
                @include('partials.session')
                @if(Auth::user()->hasCompleteProfile())
                <div class="card">
                    <div class="card-header">New Cause</div>

                    <div class="card-body">
                        @include('causes.partials.form')
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="card-header">Feature Locked</div>

                    <div class="card-body">
                        @include('causes.partials.required')
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
