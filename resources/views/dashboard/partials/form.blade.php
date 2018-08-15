<form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
	@method('PUT')
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $user->name }}" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

        <div class="col-md-6">
            <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') ? old('location') : $user->location }}" required>

            @if ($errors->has('location'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location') }}</strong>
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
            @else
                <small class="form-text text-muted">Images must be 400 x 400 pixels.</small>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>

        <div class="col-md-6">
            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4" required>
                {{ old('description') ? old('description') : $user->description }}
            </textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label for="twitter_url" class="col-md-4 col-form-label text-md-right">{{ __('Twitter') }}</label>

        <div class="col-md-6">
            <input id="twitter_url" type="text" class="form-control{{ $errors->has('twitter_url') ? ' is-invalid' : '' }}" name="twitter_url" value="{{ old('twitter_url') ? old('twitter_url') : $user->twitter_url }}" required>

            @if ($errors->has('twitter_url'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('twitter_url') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="website_url" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

        <div class="col-md-6">
            <input id="website_url" type="text" class="form-control{{ $errors->has('website_url') ? ' is-invalid' : '' }}" name="website_url" value="{{ old('website_url') ? old('website_url') : $user->website_url }}" required>

            @if ($errors->has('website_url'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('website_url') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>
</form>