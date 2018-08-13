<div class="xs-funfact-section xs-content-section-padding waypoint-tigger parallax-window" style="background-image: url('{{ asset('assets/images/backgrounds/parallax_1.jpg') }}')">
    <div class="container">
        <div class="row col-lg-10 xs-heading mx-auto">
            <h2 class="xs-title color-white small">
                Our foundation was founded in 2018 and we're only just getting started.
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="xs-single-funFact color-white">
                    <i class="icon-donation_2"></i>
                    <span class="number-percentage-count number-percentage" data-value="{{ number_format($data['total_reward'] / 1000000, 1) }}" data-animation-duration="3500">0</span><span>M</span>
                    <small>BITCORN</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="xs-single-funFact color-white">
                    <i class="icon-group"></i>
                    <span class="number-percentage-count number-percentage" data-value="{{ $data['total_players'] }}" data-animation-duration="3500">0</span>
                    <small>Farmers</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="xs-single-funFact color-white">
                    <i class="icon-children"></i>
                    <span class="number-percentage-count number-percentage" data-value="{{ $data['total_groups'] }}" data-animation-duration="3500">0</span>
                    <small>Co-Ops</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="xs-single-funFact color-white">
                    <i class="icon-planet-earth"></i>
                    <span class="number-percentage-count number-percentage" data-value="{{ $data['total_places'] }}" data-animation-duration="3500">0</span>
                    <small>Places</small>
                </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
    <div class="xs-black-overlay"></div>
</div>