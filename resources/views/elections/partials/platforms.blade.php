@foreach($candidates_random as $candidate)
<div class="xs-about-feature xs-mb-40">
    <h3>{{ $candidate->user->name }}</h3>
    <h5>Vote Code: {{ $candidate->memo }}</h5>
    @markdown($candidate->content)
</div>
@endforeach
