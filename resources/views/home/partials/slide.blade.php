<div class="xs-welcome-content" style="background-image: url('{{ $background }}');">
    <div class="container">
        <div class="xs-welcome-wraper color-white">
            <h2>{{ $title }}</h2>
            <p>{{ $subtitle_before }} <br class="d-none d-md-block" /> {{ $subtitle_after }}</p>
            <div class="xs-btn-wraper">
                <a href="https://bitcorns.com/" class="btn btn-outline-primary">
                    Join us now
                </a>
                <a href="{{ route('donate.index') }}" class="btn btn-primary">
                    <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
                </a>
            </div>
        </div>
    </div>
    <div class="xs-black-overlay"></div>
</div>