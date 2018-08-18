<div class="row mb-5">
    <div class="col">
        <form method="POST" action="{{ route('causes.update', ['cause' => $cause->id]) }}">
            @csrf

            <input type="hidden" name="decision" value="approved_at">

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">
                    {{ __('Approved') }}
                </button>
            </div>
        </form>
    </div>
    <div class="col">
        <form method="POST" action="{{ route('causes.update', ['cause' => $cause->id]) }}">
            @csrf

            <input type="hidden" name="decision" value="rejected_at">

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-warning">
                    {{ __('Rejected') }}
                </button>
            </div>
        </form>
    </div>
</div>