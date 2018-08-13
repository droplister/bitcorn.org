<section class="xs-section-padding">
    <div class="container">
        <div class="xs-heading row xs-mb-60">
            <div class="col-md-9 col-xl-9">
                <h2 class="xs-title">Our Events</h2>
                <span class="xs-separetor dashed"></span>
                <p>The Bitcorn Foundation helps facilitate events, like elections and harvests, <br> on a semi-regular schedule. Here's what's coming up...</p>
            </div>
        </div>
        <div class="row">
        	@foreach($events as $event)
                @include('events.partials.event')
            @endforeach
        </div>
    </div>
</section>