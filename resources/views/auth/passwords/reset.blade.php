@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="pb-3 mb-4 border-bottom">
                    Reset Password
                </h1>
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @include('auth.forms.reset')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
