<section class="bg-gray waypoint-tigger xs-section-padding">
    <div class="container">
        <div class="xs-heading row xs-mb-60">
            <div class="col-md-9 col-xl-9">
                <h2 class="xs-title">Bitcorn Causes</h2>
                <span class="xs-separetor dashed"></span>
                <p>The Bitcorn.org platform tries to help entrepreneurs, startups, and <br> starving artists achieve their dreams.</p>
            </div>
            <div class="col-xl-3 col-md-3 xs-btn-wraper">
                <a href="{{ route('causes.index') }}" class="btn btn-primary">All Causes</a>
            </div>
        </div>
        <div class="row">
            @foreach($causes as $cause)
                @include('causes.partials.cause')
            @endforeach
        </div>
    </div>
</section>