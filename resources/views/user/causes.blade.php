@extends('layouts.auth')

@section('title', 'My Causes')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            <a href="{{ route('causes.index') }}"><i class="fa fa-heart"></i></a>
            My Causes
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('dashboard.sidebar', ['active' => 'causes'])
            </div>
            <div class="col-md-8">
                @foreach($causes as $cause)
                @if($cause->approved_at)
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{ route('causes.show', ['causes' => $cause->id]) }}">{{ $cause->name }}</a>
                    </div>

                    <div class="card-body">
                        <p>{{ $cause->pledged_normalized }} {{ $cause->asset->display_name }}</p>
                        <div class="progress mb-3">
                          <div class="progress-bar bg-success" role="progressbar" style="width: {{ $cause->progress === 0 ? 1 : $cause->progress }}%" aria-valuenow="{{ $cause->progress === 0 ? 1 : $cause->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if($cause->pledged > 0)
                        <p>{{ $cause->asset->display_name }} will be paid to {{ $cause->address }} on {{ $cause->ended_at->toDateString() }}.</p>
                        @else
                        <p>You have not received any pledges yet. Promote it!</p>
                        @endif
                    </div>
                </div>
                @else
                <div class="card mb-4">
                    <div class="card-header">
                        <a href="{{ route('causes.show', ['causes' => $cause->id]) }}">{{ $cause->name }}</a>
                    </div>

                    <div class="card-body">
                        <p class="mb-0">Your cause is pending review. Feel free to <a href="{{ route('contact.create') }}">contact us</a>.</p>
                    </div>
                </div>
                @endif
                @endforeach
                @if(count($causes) === 0)
                <div class="card">
                    <div class="card-header">My Causes</div>

                    <div class="card-body">
                        <p>You have not created any causes yet.</p>
                        <a href="{{ route('causes.create') }}" class="btn btn-xs btn-primary">
                            New Cause
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
