<section class="bg-gray waypoint-tigger xs-section-padding">
    <div class="container">
        <div class="xs-heading row xs-mb-60">
            <div class="col-md-9 col-xl-9">
                <h2 class="xs-title">Bitcorner Causes</h2>
                <span class="xs-separetor dashed"></span>
                <p>The Bitcorn.org platform also helps entrepreneurs, startups, and <br> starving artists achieve their dreams.</p>
            </div>
            <div class="col-xl-3 col-md-3 xs-btn-wraper">
                <a href="{{ route('causes.index') }}" class="btn btn-primary">All Causes</a>
            </div>
        </div>
        <div class="row">
            @foreach($causes as $cause)
            <div class="col-lg-4 col-md-6">
                <div class="xs-popular-item xs-box-shadow">
                    <div class="xs-item-header">

                        <img src="{{ $cause->image_url }}" alt="{{ $cause->title }}">

                        <div class="xs-skill-bar">
                            <div class="xs-skill-track">
                                <p><span class="number-percentage-count number-percentage" data-value="{{ $cause->progress }}" data-animation-duration="3500">0</span>%</p>
                            </div>
                        </div>
                    </div>
                    <div class="xs-item-content">
                        <ul class="xs-simple-tag xs-mb-20">
                            <li>
                                <a href="{{ route('causes.index') }}">
                                    {{ $cause->asset->name }}
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
                            <li>
                                {{ $cause->days_left }} <span>Days to go</span>
                            </li>
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
            @endforeach
        </div>
    </div>
</section>