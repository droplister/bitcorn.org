@extends('layouts.auth')

@section('title', 'My Causes')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4">
            My Causes
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('partials.sidebar', ['active' => 'causes'])
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Causes</div>

                    <div class="card-body">
                        @foreach($causes as $cause)
                            <p>{{ $cause->name }}</p>
                        @endforeach
                        @if(count($causes) === 0)
                            <p>You have not created any causes yet.</p>
                            <a href="{{ route('causes.create') }}" class="btn btn-xs btn-primary pull-right mt-4">
                                New Cause
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
