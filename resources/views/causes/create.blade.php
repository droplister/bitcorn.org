@extends('layouts.auth')

@section('title', 'New Cause')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            <a href="{{ route('causes.index') }}"><i class="fa fa-heart"></i></a>
            New Cause
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('partials.sidebar', ['active' => 'cause'])
            </div>
            <div class="col-md-8">
                @include('partials.session')
                @if($user->hasCompleteProfile())
                <div class="card">
                    <div class="card-header">New Cause</div>

                    <div class="card-body">
                        @include('causes.partials.form')
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="card-header">Action Required</div>

                    <div class="card-body">
                        <p>In order to create a cause on Bitcorn.org, it is necessary to have a complete profile. This helps us and people who make pledges know who you are and what you're about.</p>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-xs btn-primary">
                            Edit Profile
                        </a>
                        <h6 class="font-weight-normal">To-do List:</h6>
                        <ul>
                            <li>
                                <i class="fa fa-{{ $user->description ? 'check text-success' : 'times text-warning' }}"></i>
                                Profile
                            </li>
                            <li>
                                <i class="fa fa-{{ $user->image_url ? 'check text-success' : 'times text-warning' }}"></i>
                                Image
                            </li>
                            <li>
                                <i class="fa fa-{{ $user->location ? 'check text-success' : 'times text-warning' }}"></i>
                                Location
                            </li>
                            <li>
                                <i class="fa fa-{{ $user->twitter_url || $user->website_url ? 'check text-success' : 'times text-warning' }}"></i>
                                Twitter or Website
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
