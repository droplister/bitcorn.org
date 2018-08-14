@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="pb-3 mb-4 border-bottom">
                    Login
                </h1>
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        @include('auth.forms.login')
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
