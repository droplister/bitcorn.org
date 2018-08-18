<div class="xs-event-schedule-widget">
    <div class="media xs-event-schedule">
        <div class="media-body">
            <h5>Seeking {{ number_format($cause->target_normalized) }} {{ $cause->asset->display_name }}</h5>
        </div>
    </div>
    <ul class="list-group xs-list-group">
        <li class="d-flex justify-content-between">
            Total Raised: 
            <span>{{ number_format($cause->pledged_normalized) }} {{ $cause->asset->display_name }}</span>
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
    @if(! $cause->hasEnded())
    <button type="button" class="btn btn-block btn-warning mt-5" data-toggle="modal" data-target="#pledgeModalCenter">
        Pledge {{ $cause->asset->display_name }}
    </button>
    @endif
</div>
@if(count($pledges))
<div class="widget widget_categories xs-sidebar-widget">
    <h3 class="widget-title">Recent Pledges</h3>
    <ul class="xs-side-bar-list">
        @foreach($pledges as $pledge)
        <li>
            <a href="https://xcpfox.com/tx/{{ $pledge->tx->tx_hash }}" target="_blank">
                <span>{{ $pledge->tx->confirmed_at->diffForHumans() }}</span>
                <span>{{ number_format($pledge->amount_normalized) }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endif