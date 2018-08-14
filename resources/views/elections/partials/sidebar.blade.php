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
            Open Seats: 
            <span>{{ $election->positions }}</span>
        </li>
        <li class="d-flex justify-content-between">
            Polls Closed: 
            <span>{{ $election->block_index ? $election->block_index : 'TBD' }}</span>
        </li>
    </ul>
</div>