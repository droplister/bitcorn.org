@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @include('auth.forms.register')
                    </div>
                </div>
                <p class="text-muted text-center py-4 mb-0">
                    Already have an account?
                    <a href="{{ route('login') }}" class="ml-1">
                        <i class="fa fa-sign-in"></i>
                        Sign in
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
