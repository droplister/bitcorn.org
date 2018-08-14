@extends('layouts.auth')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            Dashboard
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('partials.sidebar', ['active' => 'dashboard'])
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Welcome Back!</div>

                    <div class="card-body">
                        <p>From your dashboard you can edit your profile and create amazing causes. If you want to change your password, just logout and go through the "Forgot Password" path.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        @include('dashboard.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
