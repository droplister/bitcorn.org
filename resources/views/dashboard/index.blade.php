@extends('layouts.auth')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action active">
                      My Dashboard
                    </a>
                    <a href="{{ route('causes.create') }}" class="list-group-item list-group-item-action">
                      Create Cause
                    </a>
                    <a href="{{ route('events.create') }}" class="list-group-item list-group-item-action">
                      Create Event
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome Back!</div>

                    <div class="card-body">
                        <p>Hi {{ $user->name }},</p>
                        <p>From your dashboard you can edit your profile and create amazing causes. If you want to change your password, just logout and go through the "Forgot Password" path.</p>
                        @include('dashboard.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
