<div class="tab-pane fade show active" id="candidates" role="tabpanel">
@if(count($candidates_ranked) === 0)
    <p class="mb-0">
        <em>No candidates yet - Why not you?!</em>
    </p>
@else
    <p>Here are our election candidates:</p>
    <ul class="xs-unorder-list circle green-icon">
        @foreach($candidates_ranked as $candidate)
        <li>
            {{ $candidate->user->name }} - {{ $candidate->votes_total }} Votes
            @if($candidate->elected) <strong>ELECTED</strong> @endif
        </li>
        @endforeach
    </ul>
@endif
</div>