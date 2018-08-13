@extends('layouts.auth')

@section('title', 'Disclaimer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Disclaimer</div>

                    <div class="card-body">
                        <p>It <em>should</em> go without saying, however, since there's always going to be someone who wants to be "that guy", so... Please, in addition to everything said in our <a href="{{ route('pages.terms') }}">Terms of Service</a> and <a href="{{ route('pages.privacy') }}">Privacy Policy</a>, also understand these fine-tipped points.</p>
                        <p>Bitcorn.org and the "Bitcorn Foundation" are in no way constitue a real organization. It's a website, yes. It's a chat room, sure. But that's pretty much the extent of it.</p>
                        <p>We are live-action role playing (LARPing) as part of the larger Bitcorn Crops game, very much in the tradition of the <a href="http://rarepepefoundation.com/">Rare Pepe Foundation</a> and the citizens of <a href="https://en.wikipedia.org/wiki/Liberland">Liberland</a>.</p>
                        <p>The Bitcorn Foundation is not a 501(c)(3). It does not accept donations. In fact, we beg you to spend no time on this joke of an organization and instead volunteer or donate to worth charities and non-profits, like those listed <a href="{{ route('donate.index') }}">here</a>.</p>
                        <p>Participating as a "member" of "the board" doesn't confer any authority to you to enter into contracts or any crazy shit like that. That should be self-evident. And if you're a real twat, you'll probably be asked to stop playing and to take your ball home.</p>
                        <p>For the love of god, don't take the Bitcorn Foundation too seriously. Let it be what it is, another avenue for wacky memes and hijinks.</p>
                        <p>But, again, there is always "that guy". In fact,if you are reading this, you might literally be "that guy". Consider, if you are "that guy", we will probably admonish you with these disclaimers and laught at you, if your ego becomes bruised and you want to flip over the game board. Okay? Alright.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection