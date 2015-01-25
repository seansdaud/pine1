@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'login-post')) }}
	    <div>
	    	<input type="text" name="username" placeholder="Username" value="" required>
	    </div>
	    <div>
	    	<input type="password" name="password" placeholder="Password" required>
	    </div>

	    <div>
	    	<input type="checkbox" name="remember">
	    	<label for="remember">Remember Me</label>
	    </div>

	    <div>
	    	<input type="submit" value="Login">
	    </div>

	{{ Form::close() }}

@stop