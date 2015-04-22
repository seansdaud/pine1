@extends('frontend.layout.main')

@section('content')
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal', 'data-toggle' => 'validator')) }}
		<div class="row" style="margin: 20px auto;">
			<span id="load-image" style="display:none;"><img src="{{ asset('assets/img/ajax_load.gif') }}"></span>
			<div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
				<div class="reg">Registration >></div>
					<div class="form-wrapper">
						<div class="personal-info">Personal Info</div>
						<div style="  background: rgb(244, 60, 18); height: 4px; margin-bottom: 10px;"></div>
						<div class="form-group">
							<label for="name">Full Name</label>
							{{ Form::text('name', '', 
                            	array(
                            		'placeholder'=>'Enter Full Name',
                            		'class'=>'form-control', 'id'=>'name',
                            		'required'
                            	))
                            }}
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
							  	<div class="form-group <?php if($errors->has('username')){ echo 'has-error'; } ?>">
							  		{{ Form::text('username', '', 
		                            	array(
		                            		'placeholder'=>'Enter Username',
		                            		'class'=>'form-control',
		                            		'maxlength' => '30',
		                            		'id' => 'username',
		                            		'required'
		                            	))
		                            }}
							  		<span class="help-block with-errors">
							  			@if($errors->has('username'))
			                            	{{ $errors->first('username') }}
			                        	@endif
							  		</span>
							  	</div>
							  </div>
							  <div class="col-xs-6">
							  	<div class="form-group <?php if($errors->has('email')){ echo 'has-error'; } ?>">
							  		{{ Form::text('email', '', 
		                            	array(
		                            		'placeholder'=>'Enter Valid Email',
		                            		'class'=>'form-control',
		                            		'id' => 'email',
		                            		'pattern' => '^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$',
		                            		'required'
		                            	))
		                            }}
							  		<span class="help-block with-errors">
							  			@if($errors->has('email'))
			                            	{{ $errors->first('email') }}
			                        	@endif
							  		</span>
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
							  		{{ Form::text('address', '', 
		                            	array(
		                            		'placeholder'=>'Where do you live?',
		                            		'class'=>'form-control', 'id'=>'address',
		                            		'required'
		                            	))
		                            }}
							  		<span class="help-block with-errors"></span>
							  	</div>
							  </div>
							  <div class="col-xs-6">
							  	<div class="form-group <?php if($errors->has('contact')){ echo 'has-error'; } ?>">
							  		{{ Form::text('contact', '', 
		                            	array(
		                            		'placeholder'=>'Eg. 98460xxxxx / 061xxxxxx (Numbers Only)',
		                            		'class'=>'form-control', 'id'=>'contact',
		                            		'pattern' => '\d+$',
		                            		'required'
		                            	))
		                            }}
							  		<span class="help-block with-errors">
							  			@if($errors->has('contact'))
			                            	{{ $errors->first('contact') }}
			                        	@endif
							  		</span>
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