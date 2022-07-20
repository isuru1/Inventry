@extends('layouts.app')

@section('content')
<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">{{ __('Verify Your Email Address') }}</p>
  @if (session('resent'))
  <div class="alert alert-success" role="alert">
    {{ __('A fresh verification link has been sent to your email address.') }}
  </div>
  @endif

  {{ __('Before proceeding, please check your email for a verification link.') }}
  {{ __('If you did not receive the email') }},
  <form action="{{ route('verification.resend') }}" method="post">
    @csrf
    <div class="row">
      <!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('click here to request another') }}</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  
</div>
<!-- /.login-box-body -->
</div>
@endsection