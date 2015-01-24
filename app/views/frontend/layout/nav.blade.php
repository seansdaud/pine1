<a href="{{URL::route('home')}}">Home</a>
@if(Auth::check())
	<a href="{{ URL::route('logout') }}">Logout</a>
@else
	<a href="{{ URL::route('login') }}">Login</a>
	<a href="{{ URL::route('register') }}">Register</a>
@endif

@if(Session::has('danger'))
    {{ Session::get('danger') }}
@endif

@if(Session::has('success'))
    {{ Session::get('success') }}
@endif

@if(Session::has('warning'))
    {{ Session::get('warning') }}
@endif