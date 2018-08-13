<section class="xs-section-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="xs-donation-form-images">
                    <img src="{{ asset('assets/images/family.jpg') }}" class="img-responsive" alt="Family Images">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="xs-donation-form-wraper" >
                    <div class="xs-heading xs-mb-30">
                        <h2 class="xs-title">Make a donation</h2>
                        <p class="small">Obviously, the Bitcorn Foundation is fake and doesn't accept donations, but here are several real charities and non-profits.</p>
                        <span class="xs-separetor v2"></span>
                    </div>
                    @include('donate.partials.form')
                </div>
            </div>
        </div>
    </div>
</section>