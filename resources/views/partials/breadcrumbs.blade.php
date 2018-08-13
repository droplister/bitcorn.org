<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{ $background }}')">
    <div class="xs-black-overlay"></div>
    <div class="container">
        <div class="color-white xs-inner-banner-content">
            <h2>{{ $title }}</h2>
            <p>{{ $subtitle }}</p>
            <ul class="xs-breadcumb">
                <li class="badge badge-pill badge-primary">
                    <a href="{{ url('/') }}" class="color-white"> Home /</a> {{ $breadcrumb }}
                </li>
            </ul>
        </div>
    </div>
</section>