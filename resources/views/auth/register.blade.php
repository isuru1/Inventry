@extends('layouts.app')

@section('content')
<div class="register-box-body">
	<p class="login-box-msg">{{ __('Register a new membership') }}</p>

	<form action="{{ route('register') }}" method="post">
		@csrf
		<div class="form-group has-feedback">
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Full name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group has-feedback">
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group has-feedback">
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group has-feedback">
			<input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Retype password') }}" name="password_confirmation" required autocomplete="new-password">
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<select id="user_type" class="form-control @error('user_type') is-invalid @enderror" placeholder="{{ __('User Type') }}" name="user_type" value="{{ old('user_type') }}">
				<option>Select User Type</option>
        <option value="1">Admin</option>
        <option value="2">Super Admin</option>  
        </select>
		
			@error('user_type')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<!-- <label>
						<input type="checkbox"> I agree to the <a href="#">terms</a>
					</label> -->
				</div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat"> {{ __('Register') }}</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

	<div class="social-auth-links text-center">
		<p>- OR -</p>

	</div>

	<a href="{{ URL('login') }}" class="text-center">{{ __('I already have a membership') }}</a>
</div>
<!-- /.form-box -->
</div>
@endsection