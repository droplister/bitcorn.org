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
                <div class="card mb-3 bg-default">
                    <div class="card-body">
                        <a href="https://xchain.io/address/{{ $cause->address }}" target="_blank">
                            {{ $cause->address }}
                        </a>
                    </div>
                </div>
                <p>Use this pledge code in the memo field when sending (plain-text):</p>
                <div class="card mb-3 bg-default">
                    <div class="card-body">
                        {{ $cause->memo }}
                    </div>
                </div>
                <p><small><em><b>Notice:</b> By sending {{ $cause->asset->display_name }} you are making a non-refundable, non-deductible, pledge.</em></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif