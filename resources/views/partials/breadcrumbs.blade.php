<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{ $background }}')">
    <div class="xs-black-overlay"></div>
    <div class="container">
        <div class="color-white xs-inner-banner-content">
            <h2>{{ $title }}</h2>
            @if(isset($subtitle))
            <p>{{ $subtitle }}</p>
            @endif
            <ul class="xs-breadcumb">
                <li class="badge badge-pill badge-primary">
                    <a href="{{ route('home.index') }}" class="color-white"> Home /</a> {{ $breadcrumb }}
                </li>
            </ul>
        </div>
    </div>
</section>