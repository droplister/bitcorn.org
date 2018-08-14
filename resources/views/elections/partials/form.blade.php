<form method="POST" action="{{ route('elections.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="asset_id" class="col-md-4 col-form-label text-md-right">{{ __('Asset') }}</label>

        <div class="col-md-6">
            <select name="asset_id" id="xs-donate-charity" class="form-control">
                <option value="">Select</option>
                @foreach($assets as $asset)
                <option value="{{ $asset->id }}"{{ old('asset_id') && old('asset_id') === $asset->id ? ' selected' : '' }}>{{ $asset->name }}</option>
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
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="positions" class="col-md-4 col-form-label text-md-right">{{ __('Positions') }}</label>

        <div class="col-md-6">
            <input id="positions" type="text" class="form-control{{ $errors->has('positions') ? ' is-invalid' : '' }}" name="positions" value="{{ old('positions') }}" required>

            @if ($errors->has('positions'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('positions') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="block_index" class="col-md-4 col-form-label text-md-right">{{ __('Block Index') }}</label>

        <div class="col-md-6">
            <input id="block_index" type="text" class="form-control{{ $errors->has('block_index') ? ' is-invalid' : '' }}" name="block_index" value="{{ old('block_index') }}" required>

            @if ($errors->has('block_index'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('block_index') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="scheduled_at" class="col-md-4 col-form-label text-md-right">{{ __('Schedule At') }}</label>

        <div class="col-md-6">
            <input id="scheduled_at" type="date" class="form-control{{ $errors->has('scheduled_at') ? ' is-invalid' : '' }}" name="scheduled_at" value="{{ old('scheduled_at') }}" required>

            @if ($errors->has('scheduled_at'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('scheduled_at') }}</strong>
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