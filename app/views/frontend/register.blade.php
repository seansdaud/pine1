@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal', 'data-toggle' => 'validator', 'check-url' => URL::route('check-duplicate-users'), 'id' => 'check-duplicate')) }}
		<div class="row" style="margin: 20px auto;">
			<span id="load-image" url="{{ URL::route('home') }}">
			<div class="col-md-8">
				<div class="reg">Registration >></div>
					<div class="form-wrapper">
						<div class="personal-info">Personal Info</div>
						<div style="  background: rgb(244, 60, 18); height: 4px; margin-bottom: 10px;"></div>
						<div class="form-group">
							<label for="name">Full Name</label>
							<input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Full Name" required>
							<span class="help-block with-errors"></span>
						</div>
						<div class="row">
							  <div class="col-xs-6">
							    <label for="username">Username</label>
							  </div>
							  <div class="col-xs-6">
							    <label for="email">Email</label>
							  </div>
						</div>
						<div class="row">
							  <div class="col-xs-6">
							  	<div class="form-group">
							  		<input type="text" data-check="true" class="form-control" id="username" name="username" placeholder="Enter Username" required>
							  		<span class="help-block with-errors"></span>
							  	</div>
							  </div>
							  <div class="col-xs-6">
							  	<div class="form-group">
							  		<input type="text" data-check="true" class="form-control" id="email" name="email" placeholder="Enter Email" required>
							  		<span class="help-block with-errors"></span>
							  	</div>
							  </div>
						</div>
						<div class="row" style="margin-top:10px;">
							  <div class="col-xs-6">
							    <label for="inputpassword">Password</label>
							  </div>
							  <div class="col-xs-6">
							    <label for="confirm-password">Confirm Password</label>
							  </div>
						</div>
						<div class="row">
							  <div class="col-xs-6">
							  	<div class="form-group">
							  		<input type="password" id="inputpassword" class="form-control" name="password" placeholder="Enter Password" data-minlength="6" required>
							  		<span class="help-block with-errors">At least 6 characters</span>
							  	</div>
							  </div>
							  <div class="col-xs-6">
							  	<div class="form-group">
							  		<input type="password" id="confirm-password" class="form-control" name="password-again" data-match="#inputpassword" placeholder="Password Again" required>
							  		<span class="help-block with-errors"></span>
							  	</div>
							  </div>
						</div>

						
						<div class="personal-info" style="margin-top:15px;">Other Info</div>
						<div style="  background: rgb(244, 60, 18); height: 4px; margin-bottom: 10px;"></div>
						<div class="row">
							  <div class="col-xs-6">
							    <label for="address">Address</label>
							  </div>
							  <div class="col-xs-6">
							    <label for="contact">Contact No</label>
							  </div>
						</div>
						<div class="row">
							  <div class="col-xs-6">
							  	<div class="form-group">
							  		<input type="text" id="address" class="form-control" name="address" placeholder="Enter Address" required>
							  		<span class="help-block with-errors"></span>
							  	</div>
							  </div>
							  <div class="col-xs-6">
							  	<div class="form-group">
							  		<input type="number" data-check="true" data-minlength="9" maxlength="10" id="contact" class="form-control" name="contact" placeholder="Mobile / Phone Number" required>
							  		<span class="help-block with-errors"></span>
							  	</div>
							  </div>
						</div>
						<div class="form-group" style="margin-right:0; margin-left:0;">
							<input type="submit" class="btn btn-success" value="Register" style="margin-top:15px;">
						</div>
					</div>
			
			</div>
		</div>

	{{ Form::close() }}

@stop