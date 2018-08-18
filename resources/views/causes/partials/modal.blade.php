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
                <p>You can support this cause by sending {{ $cause->asset->display_name }} to this addess:</p>
                <div class="card mb-3 bg-primary">
                    <div class="card-body text-white">
                        {{ config('bitcorn.deposit_address') }}
                    </div>
                </div>
                <p>Use this pledge code in the memo field when sending (plain-text):</p>
                <div class="card mb-3 bg-primary">
                    <div class="card-body text-white">
                        {{ $cause->memo }}
                    </div>
                </div>
                <p><b>Notice:</b> By sending {{ $cause->asset->display_name }} you are making a non-refundable, non-deductible, pledge. All funds raised will be released to {{ $cause->user->name }} on {{ $cause->ended_at->format('F j, Y') }}, regardless of their target goal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif