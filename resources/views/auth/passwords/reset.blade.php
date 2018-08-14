@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @include('auth.forms.reset')
                    </div>
                </div>
                <p class="text-muted text-center py-4 mb-0">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="ml-1">
                        <i class="fa fa-user"></i>
                        Register
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
