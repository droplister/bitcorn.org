<article class="post format-standard hentry xs-blog-post-details">
    <div class="post-body xs-border xs-padding-40">
        <div class="entry-content">
            <h1>{{ $cause->name }}</h1>
            <p>By: {{ $cause->user->name }} - Posted: {{ $cause->approved_at->format('F jS, Y') }}.</p>
            <img src="{{ $cause->image_url }}" class="float-left mb-4 mr-4 d-none d-sm-inline-block" />
            <img src="{{ $cause->image_url }}" class="mb-4 d-block d-sm-none" />
            @markdown($cause->content)
        </div>
    </div>
</article>