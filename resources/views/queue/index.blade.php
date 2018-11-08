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
                                <h6>
                                    Issued: {{ $card['issued'] }} / Burned: {{ $card['burned'] }} / Supply: {{ $card['supply'] }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
