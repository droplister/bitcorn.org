@extends('layouts.auth')

@section('title', 'My Causes')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            My Causes
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('partials.sidebar', ['active' => 'causes'])
            </div>
            <div class="col-md-8">
                @foreach($causes as $cause)
                @if($cause->approved_at)
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('causes.show', ['causes' => $cause->id]) }}">{{ $cause->name }}</a>
                    </div>

                    <div class="card-body">
                        <div class="progress mb-3">
                          <div class="progress-bar bg-success" role="progressbar" style="width: {{ $cause->progress }}%" aria-valuenow="{{ $cause->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if($cause->pledged > 0)
                        <p>{{ $cause->asset->name }} will be paid to {{ $cause->address }} on {{ $cause->ended_at->toDateString() }}.</p>
                        @else
                        <p>You have not yet received any pledges for your cause. Promote it!</p>
                        @endif
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="card-header">
                        {{ $cause->name }}
                    </div>

                    <div class="card-body">
                        <p>Your cause is pending review and approval.</p>
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
