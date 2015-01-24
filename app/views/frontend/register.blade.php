@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post')) }}

		<div>
			<label for="name">Full Name</label>
			<input type="text" name="name" value="" placeholder="Enter Full Name" required>
		</div>

		<div>
			<label for="username">Username</label>
			<input type="text" name="username" value="" placeholder="Enter Username" required>
		</div>

		<div>
			<label for="email">Email</label>
			<input type="text" name="email" value="" placeholder="Enter Email" required>
		</div>

		<div>
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Enter Password" required>
		</div>

		<div>
			<label for="password-again">Password Again</label>
			<input type="password" name="password-again" placeholder="Password Again" required>
		</div>

		<div>
			<input type="submit" value="Register">
		</div>

	{{ Form::close() }}

@stop