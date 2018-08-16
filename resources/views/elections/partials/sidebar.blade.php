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
            Polls Close: 
            <span>{{ $election->block_index ? $election->block_index : 'TBD' }}</span>
        </li>
        <li class="d-flex justify-content-between">
            Vote Token: 
            <span>{{ $election->asset->display_name }}</span>
        </li>
    </ul>
</div>
@if(count($votes))
<div class="widget widget_categories xs-sidebar-widget mt-4">
    <h3 class="widget-title">Latest Votes</h3>
    <ul class="xs-side-bar-list">
        @foreach($votes as $vote)
        <li>
            <a href="https://xcpfox.com/tx/{{ $vote->tx->tx_hash }}" target="_blank">
                <span>
                    Candidate: {{ $vote->candidate->memo }}<br />
                    {{ $vote->amount_normalized }}
                </span>
                <span>{{ $vote->tx->confirmed_at->diffForHumans() }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endif