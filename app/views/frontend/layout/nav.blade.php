<div class="top-search">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-7 col-md-5">
				@if(Auth::check())
          <?php if(Auth::user()->usertype == "1"): ?>
              <?php $profile = URL::route('user-profile', Auth::user()->username); ?>
          <?php elseif(Auth::user()->usertype == "2"): ?>
              <?php $profile = URL::route('owner-profile'); ?>
          <?php else: ?>
              <?php $profile = URL::route('admin-profile'); ?>
          <?php endif; ?>
          <a href="{{ $profile }}"><span class="khoj">{{ Auth::user()->username }}</span></a>
					<a href="{{ URL::route('logout') }}"><span class="khoj">Logout</span></a>
				@else
            
              <div id="loginContainer">
                <a href="#" id="loginButton"><span class="khoj">Login</span></a>
                <div style="clear:both"></div>
                <div id="loginBox">
                    {{ Form::open(array('route' => 'login-post', 'id' => 'loginForm', 'class' => 'form-horizontal popout', 'data-toggle' => 'validator')) }}
                        <div class="invalid"></div>
                        <div class="loading"><img src="{{ asset('assets/img/load.gif') }}"></div>
                        <fieldset id="body">
                            <div class="form-group" style="margin-left: 0px;">
                                <input type="text" name="username" id="username" placeholder="Username" required autofocus>
                                <div class="help-block with-errors error-costum"></div>
                            </div>

                            <div class="form-group" style="margin-left: 0px;">
                                <input type="password" name="password" id="password" placeholder="Password" required>
                                <div class="help-block with-errors error-costum"></div>
                            </div>

                            <input type="submit" id="login" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" name="remember">Remember me</label>
                        </fieldset>
                        <span><a href="#" id="forgot-password">Forgot your password?</a></span>
                    {{ Form::close() }}

                    {{ Form::open(array('route' => 'forgot-login-post', 'id' => 'forgotForm', 'class' => 'form-horizontal popout', 'data-toggle' => 'validator', 'style'=>'display: none;')) }}
                        <div class="invalid"></div>
                        <div class="loading"><img src="{{ asset('assets/img/load.gif') }}"></div>
                        <fieldset id="body">
                            <div class="form-group" style="margin-left: 0px;">
                                <input type="email" name="email" id="email" placeholder="Enter your registered email" required>
                                <div class="help-block with-errors error-costum"></div>
                            </div>

                            <input type="submit" id="login" value="Recover" />
                        </fieldset>
                        <span><a href="#" id="back-to-login">Login</a></span>
                    {{ Form::close() }}
                </div>
              </div>

					<a href="{{ URL::route('register') }}"><span class="khoj">Register</span></a>
				@endif
			</div>
		</div>
	</div>
</div>

<div>
  @if(Session::has('danger'))
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('danger') }}
    </div>
  @endif

  @if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('success') }}
    </div>
  @endif

  @if(Session::has('warning'))
      <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('warning') }}
    </div>
  @endif

  @if(Session::has('info'))
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('info') }}
    </div>
  @endif

  @if(Auth::check())
      @if(Auth::user()->active == 0)
          Please activate your email. <a href="{{ URL::route('resend-email') }}">Resend Email</a>.
      @endif
  @endif
</div>

<nav class="navbar navbar-default nav-costum" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav" id="{{ $id }}">
      <li><a href="{{URL::route('home')}}">HOME</a></li>
      <li><a href="{{ URL::route('arenas') }}">ARENAS</a></li>
      <li><a href="{{ URL::route('about') }}">ABOUT</a></li>
      <li><a href="{{ URL::route('contact') }}">CONTACT</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>