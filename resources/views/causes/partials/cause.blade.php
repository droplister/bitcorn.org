<div class="col-lg-4 col-md-6">
    <div class="xs-popular-item xs-box-shadow">
        <div class="xs-item-header">
            <img src="{{ $cause->image_url }}" alt="{{ $cause->title }}" />
            <div class="xs-skill-bar">
                <div class="xs-skill-track">
                    <p>
                        <span class="number-percentage-count number-percentage" data-value="{{ $cause->progress }}" data-animation-duration="3500">0</span>%
                    </p>
                </div>
            </div>
        </div>
        <div class="xs-item-content">
            <ul class="xs-simple-tag xs-mb-20">
                <li>
                    <a href="{{ route('causes.show', ['cause' => $cause->id]) }}">
                        {{ $cause->asset->display_name }}
                    </a>
                </li>
            </ul>
            <a href="{{ route('causes.show', ['cause' => $cause->id]) }}" class="xs-post-title xs-mb-30">
                {{ $cause->name }}
            </a>
            <ul class="xs-list-with-content">
                <li>
                    {{ $cause->pledged }} <span>Pledged</span>
                </li>
                <li>
                    <span class="number-percentage-count number-percentage" data-value="{{ $cause->progress }}" data-animation-duration="3500">0</span>% <span>Funded</span>
                </li>
                @if($cause->hasEnded())
                <li>
                    Ended <span>Archive</span>
                </li>
                @else
                <li>
                    {{ $cause->days_left }} <span>Days to go</span>
                </li>
                @endif
            </ul>
            <span class="xs-separetor"></span>
            <div class="row xs-margin-0">
                <div class="xs-avatar-title">
                    <a href="{{ route('causes.show', ['cause' => $cause->id]) }}">
                        <span>By</span> {{ $cause->user->name }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>