<div class="tab-pane" id="nomination" role="tabpanel">
    <div class="xs-contact-form-wraper">
        @guest
            <div class="alert alert-warning">
                <b>Login Required:</b>
                Your candidacy won't save unless you <a href="{{ route('login') }}">login</a> first!
            </div>
        @else
            @include('partials.session')
        @endguest
        <form action="{{ route('elections.candidates.store', ['election' => $election->id]) }}" method="POST" id="xs-contact-form" class="xs-contact-form">
            @csrf
            <div class="input-group message-group">
                <textarea name="content" placeholder="Enter Your Platform....." id="xs-message" class="form-control" cols="30" rows="10"></textarea>
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} style="height:inherit">

                    <label class="form-check-label" for="terms">
                        I have reviewed my platform and <a href="{{ route('pages.disclaimer') }}" target="_blank">this disclaimer</a>.
                    </label>
                </div>
            </div>

            <button class="btn btn-success" type="submit" id="xs-submit">
                Submit
            </button>
        </form>
    </div>
</div>