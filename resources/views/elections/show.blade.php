@extends('layouts.app')

@section('title', $election->event->name)
@section('description', $election->event->description)

@section('content')
    @include('partials.breadcrumbs', [
        'background' => asset('assets/images/backgrounds/election_bg.jpg'),
        'title' => $election->event->name,
        'subtitle' => 'Get out the vote!',
        'breadcrumb' => 'Election',
    ])

    <main class="xs-main">
        <!-- event single section -->
        <section class="xs-content-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-8 xs-event-wraper">
                            <div class="xs-event-content">
                                <h4>Voting Info</h4>
                                <p>Every harvest, we hold an election to decided who will serve on the Bitcorn Foundation. Candidates can nominate themselves and state their platform. Holders of CROPS are distributed a voting token with which they can cast their votes. Nominations start as soon as the last election ends and the election winners are decided at a given block height, roughly approximating the day after the last harvest.</p>
                            </div>
                            <!-- horizontal tab -->
                            <div class="xs-horizontal-tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#candidates" role="tab">Candidates</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#candidate" role="tab">Run for Seat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#faq" role="tab">What it means?</a>
                                    </li>
                                </ul><!-- .nav-tabs END -->

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="candidates" role="tabpanel">
                                        @if(count($candidates_ranked) === 0)
                                        <p class="mb-0"><em>No candidates yet - Why not you?!</em></p>
                                        @else
                                        <p>Here are our election candidates:</p>
                                        <ul class="xs-unorder-list circle green-icon">
                                            @foreach($candidates_ranked as $candidate)
                                            <li>
                                                {{ $candidate->user->name }} - {{ $candidate->votes_total }} Votes
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div><!-- #facilities END -->
                                    <div class="tab-pane" id="candidate" role="tabpanel">
                                        <div class="xs-contact-form-wraper">
                                            @guest
                                            <div class="alert alert-warning">
                                                <b>Login Required:</b> Your candidacy won't save unless you <a href="{{ route('login') }}">login</a> first!
                                            </div>
                                            @else
                                            @include('partials.session')
                                            @endguest
                                            <form action="{{ route('elections.candidates.store', ['election' => $election->id]) }}" method="POST" id="xs-contact-form" class="xs-contact-form">
                                                @csrf
                                                <div class="input-group message-group">
                                                    <textarea name="content" placeholder="Enter Your Platform....." id="xs-message" class="form-control" cols="30" rows="10"></textarea>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} style="height:inherit">

                                                        <label class="form-check-label" for="terms">
                                                            I have reviewed my platform and <a href="{{ route('pages.disclaimer') }}" target="_blank">this disclaimer</a>.
                                                        </label>
                                                    </div>
                                                </div>

                                                <button class="btn btn-success" type="submit" id="xs-submit">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div><!-- #mapLocation END -->
                                    <div class="tab-pane" id="faq" role="tabpanel">
                                        <ul class="xs-unorder-list circle green-icon">
                                            <p>What are the "perks" of being a board member?</p>
                                            <li>Fancy Title: "Member of the Bitcorn Foundation".</li>
                                            <li>Membership in a private Bitcorn Foundation chat room.</li>
                                            <li>Access to the stream of new and unapproved bitcorn cards.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row xs-mb-60">
                            <div class="col-md-6 xs-about-feature">
                                <h3>How to Vote</h3>
                                <p>Cast your vote by sending {{ $election->asset->name }} to 1BitcornFoundationVotingxxy262cTk, making sure to use the candidate's vote code as the memo.</p>
                            </div>
                            <div class="col-md-6 xs-about-feature">
                                <h3>How it Works</h3>
                                <p>Each candidate is paired with a unique code, like "E2C3" (without the quotes). We treat asset sends as cast ballots and simply tally up the votes.</p>
                            </div>
                        </div>
                          <!-- End horizontal tab -->
                            <div class="row xs-mb-60">
                                @foreach($candidates_random as $candidate)
                                <div class="col-12 xs-about-feature">
                                    <h3>{{ $candidate->user->name }}</h3>
                                    <h5>Vote Code: {{ $candidate->memo }}</h5>
                                    @markdown($candidate->content)
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- horizontal tab -->
                            <div class="xs-event-schedule-widget">
                                <div class="media xs-event-schedule">
                                    <div class="d-flex xs-evnet-meta-date">
                                        <span class="xs-event-date">{{ $election->event->day }}</span>
                                        <span class="xs-event-month">{{ $election->event->month }}</span>
                                    </div>
                                    <div class="media-body">
                                        <h5>{{ $election->event->name }}</h5>
                                    </div>
                                </div>
                                <ul class="list-group xs-list-group">
                                    <li class="d-flex justify-content-between">
                                        Polls Close: 
                                        <span>{{ $election->block_index }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        Board Seats: 
                                        <span>{{ $election->seats }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section>  <!-- End event single section -->
    </main>
@endsection