@extends('layouts.auth')

@section('title', 'New Cause')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            New Cause
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('partials.sidebar', ['active' => 'cause'])
            </div>
            <div class="col-md-8">
                @include('partials.session')
                <div class="card">
                    <div class="card-header">New Cause</div>

                    <div class="card-body">
                        @include('causes.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
