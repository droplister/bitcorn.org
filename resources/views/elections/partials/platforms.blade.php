<div class="row xs-mb-60">
    @foreach($candidates_random as $candidate)
    <div class="col-12 xs-about-feature">
        <h3>{{ $candidate->user->name }}</h3>
        <h5>Vote Code: {{ $candidate->memo }}</h5>
        @markdown($candidate->content)
    </div>
    @endforeach
</div>