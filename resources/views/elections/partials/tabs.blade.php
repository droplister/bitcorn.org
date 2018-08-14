<div class="xs-horizontal-tabs">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#candidates" role="tab">Candidates</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#nomination" role="tab">Run for Seat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#faq" role="tab">What it means?</a>
        </li>
    </ul>

    <div class="tab-content">
        @include('elections.partials.tabs-candidates')
        @include('elections.partials.tabs-nomination')
        @include('elections.partials.tabs-faq')
    </div>
</div>