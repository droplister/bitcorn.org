@extends('layouts.auth')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome</div>

                    <div class="card-body">
                        {{ $user->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
