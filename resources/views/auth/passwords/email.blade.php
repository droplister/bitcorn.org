@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @include('partials.session')
                    @include('auth.forms.email')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
