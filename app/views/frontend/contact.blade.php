@extends("frontend.layout.main")

@section("content")
	<div class="row" >
		<div class="col-md-6 col-sm-6">
			<div class="row" style="margin-bottom:10px;">
				<div class="col-md-6">
					<div class="cat-name">
		                <span class="base schedule">Contact info</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<div class="loc">
				<div class="row">
					<div class="col-md-6">
						<span class="glyphicon glyp glyphicon-map-marker"></span><span>Location :</span>
					</div>
					<div class="col-md-6">
						<div>Mahendrapool</div>
						<div>Pokhara</div>
					</div>
					
				</div>
			</div>
			<div class="loc">
				<div class="row">
					<div class="col-md-6">
						<span class="glyphicon glyp glyphicon-envelope"></span><span>E-mail :</span>
					</div>
					<div class="col-md-6">
						<div>futsalnepal@gmail.com</div>
						<div>gameplay@gmail.com</div>
					</div>
				</div>
			</div>
			<div class="loc">
				<div class="row">
					<div class="col-md-6">
						<span class="glyphicon glyp glyphicon-earphone"></span><span>Phone :</span>
					</div>
					<div class="col-md-6">
						<div>+977-8302830028</div>
						<div>+977-0382920389</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6" style="box-shadow: 4px 19px 16px #888888;">
			<div class="row">
				<div class="col-md-6">
					<div class="cat-name">
		                <span class="base schedule">Contact Form</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<form style="margin-top:10px;" action="{{ URL::route('submit-query') }}" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" required>
			  </div>
			  <textarea class="form-control" rows="6" name="query" required></textarea>
  				<button type="submit" class="btn btn-success" style="margin-top:10px; margin-bottom:10px;">Submit</button>
  				{{ Form::token() }}
			</form>
		</div>
	</div>

@stop