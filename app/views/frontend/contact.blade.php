@extends("frontend.layout.main")

@section("content")
	<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:20px;">
		<div class="row" >
			<div class="col-md-6 col-sm-6">
				<img class="arena-banner" src="{{ asset('assets/img/stadium.jpg') }}">
			</div>
			<div class="col-md-6 col-sm-6">
				<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
				<span style="  display: block !important; position: absolute !important; width: 0 !important;  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; bottom: -77px;"></span>
				<div class="arena-wrapper">
					<div class="arena-top">Contact Us</div>
					<div style="color:white; font-family:'Titillium Web', sans-serif;"><span style="color:#F43C12;">>>  </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<span style="color:#F43C12;">  //</span></div>
				</div>
			</div>
		</div>
	</div>
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
  				<button type="submit" class="btn btn-success" style="margin-top:10px;">Submit</button>
  				{{ Form::token() }}
			</form>
		</div>
	</div>

@stop