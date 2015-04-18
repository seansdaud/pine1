<div class="modal-dialog modal-lg">
	{{ Form::open(array('route' => 'register-post', 'class'=>'form-horizontal', 'data-toggle' => 'validator', 'check-url' => URL::route('check-duplicate-users'), 'id' => 'check-duplicate')) }}
	    <div class="modal-content">
	    <span id="load-image" url="{{ URL::to("/") }}"></span>
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" style="color: #F43C12;">Futsal Registration</h4>
	        </div>

	        <div class="modal-body" style="color:black;">
					
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
					  		<input type="password" id="confirm-password" class="form-control" name="password-again" data-match="#inputpassword" data-match-error="Password does not match" placeholder="Password Again" required>
					  		<span class="help-block with-errors"></span>
					  	</div>
					  </div>
				</div>
					
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

			</div>

			<div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            <button type="submit" class="btn btn-primary">Register</button>
			</div>

		</div>
	{{ Form::close() }}
</div>