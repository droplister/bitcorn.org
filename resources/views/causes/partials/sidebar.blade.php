<div class="xs-event-schedule-widget">
    <div class="media xs-event-schedule">
        <div class="media-body">
            <h5>Seeking {{ $cause->target }} {{ $cause->asset->name }}</h5>
        </div>
    </div>
    <ul class="list-group xs-list-group">
        <li class="d-flex justify-content-between">
            Total Raised: 
            <span>{{ $cause->pledged }} {{ $cause->asset->name }}</span>
        </li>
        <li class="d-flex justify-content-between">
            Pledge Code: 
            <span>{{ $cause->memo }}</span>
        </li>
    </ul>
    <button class="btn btn-block btn-warning">
        Pledge {{ $cause->asset->name }}
    </button>
</div>
<div class="xs-countdown-timer timer-style-2 xs-mb-30" data-countdown="{{ $cause->date }}"></div>
