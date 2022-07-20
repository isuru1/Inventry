@extends('layouts.app')

@section('content')

<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">{{ __('Reset Password') }}</p>
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
  <form action="{{ route('password.email') }}" method="post">
    @csrf
    <div class="form-group has-feedback">
      <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    
    <div class="row">
      <div class="col-xs-4">
        <div class="checkbox icheck">
           <!--  <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Send Password Reset Link') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
  </div>
  <!-- /.login-box-body -->
</div>
@endsection