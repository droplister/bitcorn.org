@extends('layouts.auth')

@section('title', 'New Election')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            New Election
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('dashboard.partials.sidebar', ['active' => 'elections'])
            </div>
            <div class="col-md-8">
                @include('partials.session')
                <div class="card">
                    <div class="card-header">New Election</div>

                    <div class="card-body">
                        @include('elections.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
