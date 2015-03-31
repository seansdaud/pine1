@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal')) }}
		<div class="row" style="margin: 20px auto;">
		<div class="col-md-8">
		<div class="reg">Registration >></div>
			<form>
				<div class="form-wrapper">
					<div class="personal-info">Personal Info</div>
					<div style="  background: rgb(244, 60, 18); height: 4px; margin-bottom: 10px;"></div>
					<div class="form-group" style="margin-right:0; margin-left:0;">
						<label for="name">Full Name</label>
						<input type="text" class="form-control" name="name" value="" placeholder="Enter Full Name" required>
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
						    <input type="text" class="form-control" name="username" value="" placeholder="Enter Username" required>
						  </div>
						  <div class="col-xs-6">
						    <input type="text" class="form-control" name="email" value="" placeholder="Enter Email" required>
						  </div>
					</div>
					<div class="row" style="margin-top:10px;">
						  <div class="col-xs-6">
						    <label for="username">Password</label>
						  </div>
						  <div class="col-xs-6">
						    <label for="email">Confirm Password</label>
						  </div>
					</div>
					<div class="row">
						  <div class="col-xs-6">
						    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
						  </div>
						  <div class="col-xs-6">
						    <input type="password" class="form-control" name="password-again" placeholder="Password Again" required>
						  </div>
					</div>

					
					<div class="personal-info" style="margin-top:15px;">Other Info</div>
					<div style="  background: rgb(244, 60, 18); height: 4px; margin-bottom: 10px;"></div>
					<div class="row">
						  <div class="col-xs-6">
						    <label for="username">Address</label>
						  </div>
						  <div class="col-xs-6">
						    <label for="email">Contact No</label>
						  </div>
					</div>
					<div class="row">
						  <div class="col-xs-6">
						    <input type="text" class="form-control"  placeholder="Enter Password" required>
						  </div>
						  <div class="col-xs-6">
						    <input type="text" class="form-control" placeholder="Password Again" required>
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