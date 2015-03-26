@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal')) }}

		<div class="form-group">
			<label for="name">Full Name</label>
			<input type="text" name="name" value="" placeholder="Enter Full Name" required>
		</div>

		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" value="" placeholder="Enter Username" required>
		</div class="form-group">

		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" value="" placeholder="Enter Email" required>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Enter Password" required>
		</div>

		<div class="form-group">
			<label for="password-again">Password Again</label>
			<input type="password" name="password-again" placeholder="Password Again" required>
		</div>

		<div class="form-group">
			<input type="submit" value="Register">
		</div>

	{{ Form::close() }}

@stop