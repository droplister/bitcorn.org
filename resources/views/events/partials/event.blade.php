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
            <p>{{ $event->description }}</p>
            <div class="xs-countdown-timer" data-countdown="{{ $event->date }}"></div>
            <a href="{{ $event->event_url }}" class="btn btn-primary">
                Learn More
            </a>
        </div>
    </div>
</div>