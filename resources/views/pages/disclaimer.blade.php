@extends('layouts.auth')

@section('title', 'Disclaimer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="pb-3 mb-4 border-bottom">
                    Disclaimer
                </h1>
                <div class="card">
                    <div class="card-header">Disclaimer</div>

                    <div class="card-body">
                        <p>It <em>should</em> go without saying, however, since there's always going to be someone who wants to be "that guy"... Please, in addition to everything said in our <a href="{{ route('pages.terms') }}">Terms of Service</a> and <a href="{{ route('pages.privacy') }}">Privacy Policy</a>, also understand these fine-tipped points.</p>
                        <p>Bitcorn.org and the "Bitcorn Foundation" in no way constitue a real organization. It's a website, yes. It's a chat room, sure. But that's pretty much the extent of it.</p>
                        <p>We are live-action role playing (LARPing) as part of the larger Bitcorn Crops game, very much in the tradition of the <a href="http://rarepepefoundation.com/">Rare Pepe Foundation</a> and the citizens of <a href="https://en.wikipedia.org/wiki/Liberland">Liberland</a>.</p>
                        <p>The Bitcorn Foundation is not a 501(c)(3). It does not accept donations. In fact, we beg you to spend no time on this joke of an organization and instead volunteer or donate to worthy charities and non-profits, like those listed <a href="{{ route('donate.index') }}">here</a>.</p>
                        <p>What we do do is help our fellow memers raise silly internet tokens, if they want to do something creative for the community. If you pledge tokens, please do so in that spirit and don't be a crazy person. If you want to raise tokens, same deal.</p>
                        <p>It's 100% possible and even likely that bugs, security holes, and other run-of-the-mill forms of incompetence will lead to loss of tokens. Don't expect refunds. Don't expect bail outs. We're likely to break shit. And it could take two weeks<sup>&trade;</sup> to fix.</p>
                        <p>Participating as a "member" of "the board" doesn't confer any authority to you to enter into contracts or any crazy shit like that. That should be self-evident. And if you're a real twat, you'll probably be asked to stop playing and to take your ball home.</p>
                        <p>For the love of god, don't take the Bitcorn Foundation too seriously. Let it be what it is, another avenue for wacky memes and hijinks. If everyone is cool, we can have a lot of fun. Be cool.</p>
                        <p>But, again, there is always "that guy". In fact, if you are reading this, you might literally be "that guy". Consider, if you are "that guy", we will probably admonish you with these disclaimers and laught at you, if your ego becomes bruised and you want to flip over the game board.</p>
                        <p>Alright? Okay.</p>
                    </div>
                </div>
                <p class="text-muted text-center py-4 mb-0">
                    <a href="{{ route('home.index') }}">Home</a>
                    <a href="{{ route('pages.terms') }}" class="ml-2">Terms</a>
                    <a href="{{ route('pages.privacy') }}" class="ml-2">Privacy</a>
                    <a href="{{ route('pages.disclaimer') }}" class="ml-2">Disclaimer</a>
                </p>
            </div>
        </div>
    </div>
@endsection