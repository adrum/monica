@extends('layouts.skeleton')

@section('content')

<div class="settings">

  {{-- Breadcrumb --}}
  <div class="breadcrumb">
    <div class="{{ auth()->user()->getFluidLayout() }}">
      <div class="row">
        <div class="col-xs-12">
          <ul class="horizontal">
            <li>
              <a href="/dashboard">{{ trans('app.breadcrumb_dashboard') }}</a>
            </li>
            <li>
              <a href="/settings">{{ trans('app.breadcrumb_settings') }}</a>
            </li>
            <li>
              {{ trans('app.breadcrumb_settings_security') }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="{{ auth()->user()->getFluidLayout() }}">
    <div class="row">

      @include('settings._sidebar')

      <div class="col-xs-12 col-md-9">

        <div class="br3 ba b--gray-monica bg-white mb4">
          <div class="pa3 bb b--gray-monica">
            <h3 class="with-actions">{{ trans('settings.2fa_title') }}</h3>
            <p>{{ trans('settings.2fa_disable_description') }}</p>

            @include('partials.errors')

            <form action="/settings/security/2fa-disable" method="POST">
              {{ csrf_field() }}

              {{-- code --}}
              <div class="form-group">
                <label for="one_time_password">{{ trans('auth.2fa_one_time_password') }}</label>
                <input type="number" class="form-control" id="one_time_password" name="one_time_password" required />
              </div>

              <button type="submit" name="verify" class="btn btn-primary">{{ trans('app.verify') }}</button>
              <a href="/settings/security" class="btn">{{ trans('app.cancel') }}</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
