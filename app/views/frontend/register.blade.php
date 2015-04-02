@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal', 'data-toggle' => 'validator', 'check-url' => URL::route('check-duplicate-users'), 'id' => 'check-duplicate')) }}
		<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:20px;">
	<div class="row" >
		<div class="col-md-6 col-sm-6">
			<img class="arena-banner" src="{{ asset('assets/img/4982__1753__gerrard1000_5425b91e0e98e402487932.jpg') }}">
		</div>
		<div class="col-md-6 col-sm-6">
			<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
			<span style="  display: block !important; position: absolute !important; width: 0 !important;
  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; bottom: -77px;"></span>
			<div class="arena-wrapper">
				<div class="arena-top">Futsal Registration</div>
				<div style="color:white; font-family:'Titillium Web', sans-serif;"><span style="color:#F43C12;">>>  </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<span style="color:#F43C12;">  //</span></div>
			</div>
		</div>
	</div>
	</div>
		<div class="row" style="margin: 20px auto;">
			<span id="load-image" url="{{ URL::route('home') }}">
			<div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
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