<div class="xs-author-block xs-padding-40 xs-border">
    <div class="post-author">
        <div class="xs-round-avatar float-left">
            <img src="{{ $cause->user->image_url }}" alt="{{ $cause->user->name }}" class="img-responsive" />
        </div>
        <div class="xs-post-author-details float-right">
            <a href="{{ $cause->user->website_url ? $cause->user->website_url : $cause->user->twitter_url }}">
                {{ $cause->user->name }}
            </a>
            <em>
                <i class="fa fa-map-marker color-green"></i> {{ $cause->user->location }}
            </em>
            <span class="xs-separetor"></span>
            @if($cause->user->twitter_url)
            <ul class="xs-social-list simple">
                <li>
                    <a href="{{ $cause->user->twitter_url }}" class="color-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
            </ul>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="post-content">
        <p class="xs-mb-0">{{ $cause->user->description }}</p>
    </div>
    <div class="clearfix"></div>
</div>