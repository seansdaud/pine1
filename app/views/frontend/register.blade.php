@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal', 'data-toggle'=>'validator')) }}

		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Full Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Full Name" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-6">
				<input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div class="form-group">

		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-6">
				<input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-6">
				<input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" data-minlength="6" required>
			</div>
			<div class="col-sm-4 help-block with-errors">At least 6 characters</div>
		</div>

		<div class="form-group">
			<label for="password-again" class="col-sm-2 control-label">Password Again</label>
			<div class="col-sm-6">
				<input type="password" class="form-control" id="password-again" data-match="#password" name="password-again" placeholder="Password Again" required>
			</div>
			
		</div>

		<div class="form-group">
			<input type="submit" class="col-sm-offset-2 btn btn-default" value="Register">
		</div>

	{{ Form::close() }}

@stop