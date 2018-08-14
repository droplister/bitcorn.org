<form method="POST" action="{{ route('causes.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle') }}</label>

        <div class="col-md-6">
            <input id="subtitle" type="text" class="form-control{{ $errors->has('subtitle') ? ' is-invalid' : '' }}" name="subtitle" value="{{ old('subtitle') }}" required>

            @if ($errors->has('subtitle'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('subtitle') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="asset" class="col-md-4 col-form-label text-md-right">{{ __('Asset') }}</label>

        <div class="col-md-6">
            <select name="asset_id" id="xs-donate-charity" class="form-control">
                <option value="">Select</option>
                @foreach($assets as $asset)
                <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('asset_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('asset_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

        <div class="col-md-6">
            <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required>

            @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

        <div class="col-md-6">
            <input id="content" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required>

            @if ($errors->has('content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

            @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="memo" class="col-md-4 col-form-label text-md-right">{{ __('Memo') }}</label>

        <div class="col-md-6">
            <input id="memo" type="text" class="form-control{{ $errors->has('memo') ? ' is-invalid' : '' }}" name="memo" value="{{ old('memo') }}" required>

            @if ($errors->has('memo'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('memo') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('Target') }}</label>

        <div class="col-md-6">
            <input id="target" type="text" class="form-control{{ $errors->has('target') ? ' is-invalid' : '' }}" name="target" value="{{ old('target') }}" required>

            @if ($errors->has('target'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('target') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="ended_at" class="col-md-4 col-form-label text-md-right">{{ __('Ended At') }}</label>

        <div class="col-md-6">
            <input id="ended_at" type="date" class="form-control{{ $errors->has('ended_at') ? ' is-invalid' : '' }}" name="ended_at" value="{{ old('ended_at') }}" required>

            @if ($errors->has('ended_at'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ended_at') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Create') }}
            </button>
        </div>
    </div>
</form>