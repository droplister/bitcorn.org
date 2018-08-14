<div class="xs-event-schedule-widget">
    <div class="media xs-event-schedule">
        <div class="media-body">
            <h5>Seeking {{ $cause->target_normalized }} {{ $cause->asset->name }}</h5>
        </div>
    </div>
    <ul class="list-group xs-list-group">
        <li class="d-flex justify-content-between">
            Total Raised: 
            <span>{{ $cause->pledged_normalized }} {{ $cause->asset->name }}</span>
        </li>
        <li class="d-flex justify-content-between">
            Released On: 
            <span>{{ $cause->ended_at->format('F j') }}</span>
        </li>
        <li class="d-flex justify-content-between">
            Pledge Code: 
            <span>{{ $cause->memo }}</span>
        </li>
    </ul>
    <button class="btn btn-block btn-warning mt-5">
        Pledge {{ $cause->asset->name }}
    </button>
</div>