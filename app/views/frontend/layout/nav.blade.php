<div class="top-search">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-7 col-md-5">
				@if(Auth::check())
					<a href="{{ URL::route('logout') }}"><span class="khoj">Logout</span></a>
				@else
            
              <div id="loginContainer">
                <a href="#" id="loginButton"><span class="khoj">Login</span></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <input type="submit" id="login" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
                        </fieldset>
                        <span><a href="#">Forgot your password?</a></span>
                    </form>
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