@extends('layouts.auth')

@section('title', 'New Election')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('partials.sidebar', ['active' => 'elections'])
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Election</div>

                    <div class="card-body">
                        @include('partials.session')
                        @include('elections.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
