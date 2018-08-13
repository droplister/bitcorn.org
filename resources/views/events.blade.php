@extends('layouts.app')

@section('title', 'Events')

@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('assets/images/backgrounds/event_bg.jpg')">
    <div class="xs-black-overlay"></div>
    <div class="container">
        <div class="color-white xs-inner-banner-content">
            <h2>Events</h2>
            <p>Bitcorn Harvests</p>
            <ul class="xs-breadcumb">
                <li class="badge badge-pill badge-primary">
                    <a href="{{ url('/') }}" class="color-white"> Home /</a> Events
                </li>
            </ul>
        </div>
    </div>
</section>
<!--breadcumb end here--><!-- End welcome section -->


<main class="xs-main">
    <!-- video popup section section -->
    <section class="xs-content-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">17</span>
                            <span class="entry-date-month">Aug</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #0</a>
                        <p>Get out the vote! We're electing four interim board members!</p>
                        <div class="xs-countdown-timer" data-countdown="2018/08/17"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_4.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Oct</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #3</a>
                        <p>2,625,000 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2018/10/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Oct</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #1</a>
                        <p>Get out the vote! It's time for our first full-term election.</p>
                        <div class="xs-countdown-timer" data-countdown="2018/10/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_1.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #4</a>
                        <p>2,625,000 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2019/01/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #2</a>
                        <p>Get out the vote! Who will start our 2019 off strong?</p>
                        <div class="xs-countdown-timer" data-countdown="2019/01/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_2.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Apr</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #5</a>
                        <p>1,312,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2019/04/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Apr</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #3</a>
                        <p>Pay your taxes and don't forget to get out the vote!</p>
                        <div class="xs-countdown-timer" data-countdown="2019/04/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_3.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Jul</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #6</a>
                        <p>1,312,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2019/07/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jul</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #4</a>
                        <p>There is no conspiracy, but there is a shadow government.</p>
                        <div class="xs-countdown-timer" data-countdown="2019/07/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_4.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Oct</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #7</a>
                        <p>1,312,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2019/10/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jul</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #5</a>
                        <p>Halt Citizen! It's time to vote. Do your part and GOTV!</p>
                        <div class="xs-countdown-timer" data-countdown="2019/10/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_1.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #8</a>
                        <p>1,312,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/01/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jul</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #6</a>
                        <p>Do you have 20/20 vision? Vote like it's the year 2099.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/01/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_2.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Apr</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #9</a>
                        <p>787,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/04/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Apr</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #7</a>
                        <p>Lucky number seven. It's that time again. VOTE!</p>
                        <div class="xs-countdown-timer" data-countdown="2020/04/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_3.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Jul</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #10</a>
                        <p>787,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/07/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jul</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #8</a>
                        <p>If it's on a blockchain, the election isn't rigged. Vote!</p>
                        <div class="xs-countdown-timer" data-countdown="2020/07/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_4.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Oct</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #11</a>
                        <p>787,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/10/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Oct</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #9</a>
                        <p>Let's round out 2020 strong with four awesome board members.</p>
                        <div class="xs-countdown-timer" data-countdown="2020/10/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_1.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #12</a>
                        <p>787,500 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2021/01/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #10</a>
                        <p>This is the last full-year of competitive game play. Let's do this!</p>
                        <div class="xs-countdown-timer" data-countdown="2021/01/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_2.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Apr</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #13</a>
                        <p>525,000 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2021/04/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #11</a>
                        <p>Who will guide us through the final halvening? Vote well!</p>
                        <div class="xs-countdown-timer" data-countdown="2021/04/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_3.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Jul</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #14</a>
                        <p>525,000 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2021/07/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #12</a>
                        <p>The penultimate Bitcorn Foundation board during game play.</p>
                        <div class="xs-countdown-timer" data-countdown="2021/07/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_4.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Oct</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #15</a>
                        <p>525,000 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2021/10/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/election.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">2</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="{{ url('/board') }}">Board Election #13</a>
                        <p>Vote for who you want to see at the award ceremony!</p>
                        <div class="xs-countdown-timer" data-countdown="2022/01/02"></div>
                        <a href="{{ url('/board') }}" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
            <div class="col-lg-6 row xs-single-event">
                <div class="col-md-5">
                    <div class="xs-event-image">
                        <img src="assets/images/event/event_1.jpg" alt="">
                        <div class="xs-entry-date">
                            <span class="entry-date-day">1</span>
                            <span class="entry-date-month">Jan</span>
                        </div>
                        <div class="xs-black-overlay"></div>
                    </div><!-- .xs-event-image END -->
                </div>
                <div class="col-md-7">
                    <div class="xs-event-content">
                        <a href="https://bitcorns.com/almanac">Bitcorn Harvest #16</a>
                        <p>525,000 BITCORN is expected to be harvested on this day.</p>
                        <div class="xs-countdown-timer" data-countdown="2022/01/01"></div>
                        <a href="https://bitcorns.com/almanac" class="btn btn-primary">
                            Learn More
                        </a>
                    </div><!-- .xs-event-content END -->
                </div>
            </div><!-- .xs-single-event END -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section>    <!-- End video popup section section -->

    @include('partials.partners')
</main>
@endsection