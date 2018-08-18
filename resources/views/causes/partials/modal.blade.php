@if(! $cause->hasEnded())
<div class="modal fade" id="pledgeModalCenter" tabindex="-1" role="dialog" aria-labelledby="pledgeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pledgeModalLongTitle">Pledge {{ $cause->asset->display_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You can support this cause by sending {{ $cause->asset->display_name }} to the addess shown below:</p>
                <blockquote>{{ config('bitcorn.deposit_address') }}</blockquote>
                <p>When making your pledge, make sure you include this pledge code as a plain-text memo:</p>
                <blockquote>{{ $cause->memo }}</blockquote>
                <p>By sending {{ $cause->asset->display_name }} you are making a non-refundable, non-deductible, pledge. All funds raised will be released to {{ $cause->user->name }} on {{ $cause->ended_at->format('F j, Y') }}.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif