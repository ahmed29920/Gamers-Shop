@extends('profile.edit')

@section('profile_content')
    <form method="post" class="mb-4" action="{{ route('profile.update') }}" autocomplete="off">
        @csrf
        @method('put')

        @include('alerts.success')

        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <label>{{ trans('main.name') }}</label>
            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                placeholder="{{ trans('main.name') }}" value="{{ old('name', auth()->user()->name) }}">
            @include('alerts.feedback', ['field' => 'name'])
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
            <label>{{ trans('main.email_address') }}</label>
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                placeholder="{{ trans('main.email_address') }}" value="{{ old('email', auth()->user()->email) }}">
            @include('alerts.feedback', ['field' => 'email'])
        </div>
        <button type="submit" class="btn btn-dark">{{trans('main.save')}}</button>
    </form>

    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
        @csrf
        @method('put')

        @include('alerts.success', ['key' => 'password_status'])

        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
            <label>{{ trans('main.current_password') }}</label>
            <input type="password" name="old_password"
                class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                placeholder="{{ trans('main.current_password') }}" value="" required>
            @include('alerts.feedback', ['field' => 'old_password'])
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
            <label>{{ trans('main.new_password') }}</label>
            <input type="password" name="password"
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                placeholder="{{ trans('main.new_password') }}" value="" required>
            @include('alerts.feedback', ['field' => 'password'])
        </div>
        <div class="form-group">
            <label>{{ trans('main.confirm_new_password') }}</label>
            <input type="password" name="password_confirmation" class="form-control"
                placeholder="{{ trans('main.confirm_new_password') }}" value="" required>
        </div>
        <button type="submit" class="btn btn-fill btn-dark">{{ trans('main.change_password') }}</button>
    </form>
@endsection
