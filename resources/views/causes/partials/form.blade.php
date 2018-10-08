<form method="POST" action="{{ route('causes.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }} <span class="text-danger">*</span></label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @else
                <small class="form-text text-muted">Example: Name of the Cause</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle') }} <span class="text-danger">*</span></label>

        <div class="col-md-6">
            <input id="subtitle" type="text" class="form-control{{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" value="{{ old('subtitle') }}" required>

            @if ($errors->has('subtitle'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('subtitle') }}</strong>
                </span>
            @else
                <small class="form-text text-muted">Example: Reason for the cause...</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }} <span class="text-danger">*</span></label>

        <div class="col-md-6">
            <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required>

            @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @else
                <small class="form-text text-muted">Images must be 370 x 240 pixels.</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }} <span class="text-danger">*</span></label>

        <div class="col-md-6">
            <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="12" required>{{ old('content') }}</textarea>

            @if ($errors->has('content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @else
                <small class="form-text text-muted">Use of Markdown is allowed. (<a href="http://markdownlivepreview.com" target="_blank">Preview</a>) (<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Cheatsheet</a>)</small>
            @endif
        </div>
    </div>

    <hr class="my-4" />

    <h6 class="font-weight-normal">I want to raise...</h6>

    <div class="form-group row">
        <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('Target') }} <span class="text-danger">*</span></label>

        <div class="col-8 col-md-3">
            <input id="target" type="text" class="form-control{{ $errors->has('target') ? ' is-invalid' : '' }}" name="target" value="{{ old('target') }}" placeholder="10" required>

            @if ($errors->has('target'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('target') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-4 col-md-3">
            <select name="asset_id" id="xs-donate-charity" class="form-control">
                @foreach($assets as $asset)
                <option value="{{ $asset->id }}">{{ $asset->display_name }}</option>
                @endforeach
            </select>

            @if ($errors->has('asset_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('asset_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-12 col-md-6 offset-md-4">
            @if (! $errors->has('target') && ! $errors->has('asset_id'))
                <small class="form-text text-muted">Whole numbers only, like 10 instead of 10.23456789.</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="ended_at" class="col-md-4 col-form-label text-md-right">{{ __('Before') }} <span class="text-danger">*</span></label>

        <div class="col-md-6">
            <input id="ended_at" type="date" class="form-control{{ $errors->has('ended_at') ? ' is-invalid' : '' }}" name="ended_at" value="{{ old('ended_at') }}" required>

            @if ($errors->has('ended_at'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ended_at') }}</strong>
                </span>
            @else
                <small class="form-text text-muted">Select the day your campaign ends. (Max: 45 days.)</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="memo" class="col-md-4 col-form-label text-md-right">{{ __('Memo') }} <span class="text-danger">*</span></label>

        <div class="col-md-6">
            <input id="memo" type="text" class="form-control{{ $errors->has('memo') ? ' is-invalid' : '' }}" name="memo" value="{{ old('memo') }}" required>

            @if ($errors->has('memo'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('memo') }}</strong>
                </span>
            @else
                <small class="form-text text-muted">Unique memo required for pledging to this cause.</small>
            @endif
        </div>
    </div>

    <hr class="my-4" />

    <h6 class="font-weight-normal">Please send to...</h6>

    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }} <span class="text-danger">*</span></label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

            @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @else
                <small class="form-text text-muted">Pledgers will pay you directly at this address.</small>
            @endif
        </div>
    </div>

    <hr class="my-4" />

    <h6 class="font-weight-normal">The final steps...</h6>

    <div class="alert alert-warning mt-3">
        <b>Notice:</b> At this time, once submitted, you cannot edit a cause. Please, review everything above, especially the address where you will be receiving funds raised.
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="terms" id="terms" style="height:inherit">

            <label class="form-check-label" for="terms"> I have read the above notices and <a href="https://bitcorn.org/disclaimer" target="_blank">this disclaimer</a>. It's not lost on me that this is a light-hearted memetic project and I submit this cause in that spirit. <span class="text-danger">*</span></label>

            @if ($errors->has('terms'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('terms') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Publish Cause') }}
            </button>
        </div>
    </div>
</form>