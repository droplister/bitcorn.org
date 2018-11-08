@extends('layouts.auth')

@section('title', 'Card Queue')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 border-bottom">
            <a href="{{ route('queue.index') }}"><i class="fa fa-clone"></i></a>
            Card Queue
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                @include('dashboard.partials.sidebar', ['active' => 'queue'])
            </div>
            <div class="col-md-8">
                @foreach($cards as $card)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <a href="{{ $card['link'] }}?preview=true" target="_blank">
                                    <img src="{{ $card['card'] }}" width="100%" />
                                </a>
                            </div>
                            <div class="col-9">
                                <h3>
                                    <a href="{{ $card['link'] }}?preview=true" target="_blank">
                                        {{ $card['name'] }}
                                    </a>
                                </h3>
                                <h6 class="mb-3">
                                    Issued: {{ $card['issued'] }} / Burned: {{ $card['burned'] }}
                                </h6>
                                @if($decision = Auth::user()->decisions()->where('card', '=', $card['name'])->first())
                                    <h6 class="mb-3">
                                        You voted to:
                                        <span class="{{ $decision->approve ? 'text-success' : 'text-danger' }}">
                                            {{ $decision->approve ? 'APPROVE' : 'DENY' }}
                                        </span>
                                    </h6>
                                @else
                                    <a href="{{ route('queue.store', ['card' => $card['name'], 'decision' => 'approve']) }}" class="btn btn-success mr-2">
                                        Approve
                                    </a>
                                    <a href="{{ route('queue.store', ['card' => $card['name'], 'decision' => 'deny']) }}" class="btn btn-danger">
                                        Deny
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
