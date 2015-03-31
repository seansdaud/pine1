@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal', 'data-toggle' => 'validator')) }}
		<div class="row" style="margin: 20px auto;">
		<div class="col-md-8">
		<div class="reg">Registration >></div>
			<form>
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
						  		<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
						  		<span class="help-block with-errors"></span>
						  	</div>
						  </div>
						  <div class="col-xs-6">
						  	<div class="form-group">
						  		<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
						  		<span class="help-block with-errors"></span>
						  	</div>
						  </div>
					</div>
					<div class="row" style="margin-top:10px;">
						  <div class="col-xs-6">
						    <label for="password">Password</label>
						  </div>
						  <div class="col-xs-6">
						    <label for="confirm-password">Confirm Password</label>
						  </div>
					</div>
					<div class="row">
						  <div class="col-xs-6">
						  	<div class="form-group">
						  		<input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" data-minlength="6" required>
						  		<span class="help-block with-errors">At least 6 characters</span>
						  	</div>
						  </div>
						  <div class="col-xs-6">
						  	<div class="form-group">
						  		<input type="password" id="confirm-password" class="form-control" name="password-again" data-match="#password" placeholder="Password Again" required>
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
						  		<input type="number" data-minlength="9" maxlength="10" id="contact" class="form-control" name="contact" placeholder="Mobile / Phone Number" required>
						  		<span class="help-block with-errors"></span>
						  	</div>
						  </div>
					</div>
					<div class="form-group" style="margin-right:0; margin-left:0;">
						<input type="submit" class="btn btn-success" value="Register" style="margin-top:15px;">
					</div>
				</div>
			</form>
		
		</div>
		<div class="col-md-4">
		<div class="reg">Sign In >></div>
			<form>
				<div class="form-wrapper">
				  <div class="form-group" style="margin-right:0; margin-left:0;">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
				  </div>
				  <div class="form-group" style="margin-right:0; margin-left:0;">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  
				  <button type="submit" class="btn btn-default">Submit</button>
				</div>
			</form>
		<div class="reg" style="margin-top:20px;">Forgot Password >></div>
		<form>
			<div class="form-wrapper">
				<div class="form-group" style="margin-right:0; margin-left:0;">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
				  </div>
				  <button type="submit" class="btn btn-default">Send</button>
			</div>
		</form>
		</div>
		</div>

	{{ Form::close() }}

@stop