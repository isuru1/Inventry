@extends('layouts.app')

@section('content')

<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">{{ __('Confirm Password') }}</p>
  {{ __('Please confirm your password before continuing.') }}
  <form action="{{ route('password.confirm') }}" method="post">
    @csrf

    <div class="form-group has-feedback">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
           <!--  <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"> {{ __('Confirm Password') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>

    </div>
    <!-- /.social-auth-links -->

    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
      {{ __('I forgot my password') }}
    </a>
    @endif
    
  </div>
  <!-- /.login-box-body -->
</div>
@endsection