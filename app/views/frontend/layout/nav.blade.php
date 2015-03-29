<div class="top-search">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-7 col-md-5">
				@if(Auth::check())
          <a href="{{ URL::route('user-profile', Auth::user()->username) }}"><span class="khoj">{{ Auth::user()->username }}</span></a>
					<a href="{{ URL::route('logout') }}"><span class="khoj">Logout</span></a>
				@else
            
              <div id="loginContainer">
                <a href="#" id="loginButton"><span class="khoj">Login</span></a>
                <div style="clear:both"></div>
                <div id="loginBox">
                    {{ Form::open(array('route' => 'login-post', 'id' => 'loginForm', 'class' => 'form-horizontal', 'data-toggle' => 'validator')) }}
                        <div class="invalid"></div>
                        <div class="loading"><img src="{{ asset('assets/img/load.gif') }}"></div>
                        <fieldset id="body">
                            <div class="form-group">
                                <input type="text" name="username" id="username" placeholder="Username" required autofocus>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Password" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <input type="submit" id="login" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" name="remember">Remember me</label>
                        </fieldset>
                        <span><a href="#">Forgot your password?</a></span>
                    {{ Form::close() }}
                </div>
            </div>

					<a href="{{ URL::route('register') }}"><span class="khoj">Register</span></a>
				@endif
				<span id="wrap">
				  <form action="" autocomplete="on">
					  <input id="search" name="search" type="text" placeholder="What're we looking for ?">
					  <span class="glyphicon glyphicon-search gly-search"></span><input id="search_submit" value="Rechercher" type="submit">
				  </form>
				</span>
			</div>
		</div>
	</div>
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
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{URL::route('home')}}">HOME</a></li>
      <li><a href="#">ARENAS</a></li>
      <li><a href="#">BOOKING</a></li>
      <li><a href="#">ABOUT</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

@if(Session::has('danger'))
    {{ Session::get('danger') }}
@endif

@if(Session::has('success'))
    {{ Session::get('success') }}
@endif

@if(Session::has('warning'))
    {{ Session::get('warning') }}
@endif