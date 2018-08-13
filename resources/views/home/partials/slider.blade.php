<section class="xs-welcome-slider">
    <div class="xs-banner-slider owl-carousel">
        @include('home.partials.slide', [
            'background' => asset('assets/images/slider/slider_1.jpg'),
            'title' => 'Dryness is a Global Problem',
            'subtitle_before' => 'Hundreds of thousands of farmers annually experience extreme dryness',
            'subtitle_after' => 'due to a chronic lack of moisture.',
        ])
        @include('home.partials.slide', [
            'background' => asset('assets/images/slider/slider_2.jpg'),
            'title' => 'We\'re Funding Research',
            'subtitle_before' => 'Innovative research into cryptographically modified organisms suggests that',
            'subtitle_after' => 'new and unprecedented yields are possible.',
        ])
        @include('home.partials.slide', [
            'background' => asset('assets/images/slider/slider_3.jpg'),
            'title' => 'Harvest Crops Worldwide',
            'subtitle_before' => 'With your help we can spread CMOs to the furthest reaches of the globe',
            'subtitle_after' => 'and track those crops on the blockchain.',
        ])
        @include('home.partials.slide', [
            'background' => asset('assets/images/slider/slider_4.jpg'),
            'title' => 'A World Without Dryness',
            'subtitle_before' => 'We have a mission and the vision to drive out dry memes everywhere',
            'subtitle_after' => 'and replace them with memes soaked in moisture.',
         ])
    </div>
</section>