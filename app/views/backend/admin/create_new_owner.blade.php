@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
	    <li><a href="{{ URL::route('owners') }}">Owners</a></li>
	    <li class="active">Create New</li>
	</ol>
	<div class="row mt">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-panel">
				{{ Form::open(array('route' => 'create-new-owner-post', 'class' => 'form-horizontal style-form', 'data-toggle' => 'validator')) }}

					<div class="form-group">
						<label class="col-sm-2 control-label" for="name">Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" placeholder="Enter Full Name" class="form-control" required>
						</div>
						<div class="col-sm-4 help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="username">Username</label>
						<div class="col-sm-6">
							<input type="text" name="username" data-check="true" placeholder="Enter Username" class="form-control" data-minlength="5" data-remote="{{ URL::route('check-duplicate-owners') }}" required>
						</div>
						<div class="col-sm-4 help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="email">Email</label>
						<div class="col-sm-6">
							<input type="email" name="email" data-check="true" placeholder="Enter Email" class="form-control" required pattern="^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$">
						</div>
						<div class="col-sm-4 help-block with-errors"></div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-3">
							<input type="submit" class="btn btn-primary" value="Create">
						</div>
					</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop