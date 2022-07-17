@extends('profile.edit')

@section('profile_content')
<form method="post" class="mb-4" action="{{ route('profile.update') }}" autocomplete="off">
    @csrf
    @method('put')

    @include('alerts.success')

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label>{{ __('Name') }}</label>
        <input type="text" name="name"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
        @include('alerts.feedback', ['field' => 'name'])
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
        <label>{{ __('Email address') }}</label>
        <input type="email" name="email"
            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
            placeholder="{{ __('Email address') }}"
            value="{{ old('email', auth()->user()->email) }}">
        @include('alerts.feedback', ['field' => 'email'])
    </div>
    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
</form>

<form method="post" action="{{ route('profile.password') }}" autocomplete="off">
    @csrf
    @method('put')

    @include('alerts.success', ['key' => 'password_status'])

    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
        <label>{{ __('Current Password') }}</label>
        <input type="password" name="old_password"
            class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
            placeholder="{{ __('Current Password') }}" value="" required>
        @include('alerts.feedback', ['field' => 'old_password'])
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
        <label>{{ __('New Password') }}</label>
        <input type="password" name="password"
            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
            placeholder="{{ __('New Password') }}" value="" required>
        @include('alerts.feedback', ['field' => 'password'])
    </div>
    <div class="form-group">
        <label>{{ __('Confirm New Password') }}</label>
        <input type="password" name="password_confirmation" class="form-control"
            placeholder="{{ __('Confirm New Password') }}" value="" required>
    </div>
    <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
</form>
@endsection