<div class="col-lg-6 row xs-single-event">
    <div class="col-md-5">
        <div class="xs-event-image">
            <img src="{{ $event->image_url }}" alt="{{ $event->name }}">
            <div class="xs-entry-date">
                <span class="entry-date-day">{{ $event->day }}</span>
                <span class="entry-date-month">{{ $event->month }}</span>
            </div>
            <div class="xs-black-overlay"></div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="xs-event-content">
            <a href="{{ $event->event_url }}">{{ $event->name }}</a>
            <p>{{ $event->date }}</p>
            <p>{{ $event->election->candidates->count() }} Candidates<br />
               {{ $event->election->votes->count() }} Voting TXs<br />
               {{ number_format(fromSatoshi($event->election->votes->sum('amount')), 2) }}% Turnout</p>
            <a href="{{ $event->event_url }}" class="btn btn-primary">
                View Results
            </a>
        </div>
    </div>
</div>