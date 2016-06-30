@extends('layouts.login-master')

@section('title', 'PSMIS')

@section('content')
<div id="login" class=" form">
	<section class="login_content">
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
              <h1>Login Form</h1>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" />
                @if ($errors->has('email'))
                   <span class="help-block">
                   		<strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                	@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
              </div>
              <div>
                <button type="submit" class="btn btn-default btn-primary">
                	<i class="fa fa-btn fa-sign-in"></i> Login
                </button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">New to site?
                  <a href="javascript::void()" id="create_acc" class="to_register"> Create Account </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw" style="font-size: 26px;"></i> SMIS!</h1>

                  <p>©2015 All Rights Reserved. SMIS is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
	</section>
</div>

 <div id="register-form" style="display: none;" class=" form">
		<section class="login_content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            	{{ csrf_field() }}
              <h1>Create Account</h1>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="name" placeholder="Name" required="" />
                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="" />
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="" />
                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
              </div>
              <button type="submit" class="btn btn-primary">
					<i class="fa fa-btn fa-user"></i> Register
				</button>
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">Already a member ?
                  <a href="#tologin" class="to_register" id="login-btn"> Log in </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw" style="font-size: 26px;"></i></h1>

                  <p>©2015 All Rights Reserved. SMIS</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        @push('scripts')
        	<script src="{{ URL::asset('js/my_js/login.js') }}"></script>
        @endpush
@endsection