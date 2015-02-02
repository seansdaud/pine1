@extends('backend.layout.main')

@section("content")
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<div class="showback">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<img src="{{ asset('assets/img/profile/'.head(explode('.', Auth::user()->image)).'_thumb.'.last(explode('.', Auth::user()->image))) }}" style="max-width: 100%; height: auto;">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding:0px;">
					{{ Form::open(array('route' => 'change-admin-profile-picture', 'files' => true, 'id'=>'change-admin-profile-pic')) }}
						<a class="choose change">
							<span class="change-text">Change</span>
							<span class="change-icon"><i class="fa fa-pencil"></i></span>
							<input type="file" name="image" id="change-profile-pic" accept="image/gif, image/jpeg, image/png" required/>
						</a>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<!-- Username -->
		<div class="showback">
			<span id="to-be-changed">{{ Auth::user()->username }}</span>
			<a class="change" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
			{{ Form::open(array('route' => 'change-admin-username', 'id' => 'change-admin-username-form', 'class' => 'form-inline')) }}
				<div class="form-group">
					<input type="text" value="{{ Auth::user()->username }}" change="Username" class="form-control" id="new-value" placeholder="Enter Username">
				</div>
				<input type="submit" class="btn btn-primary" value="Save">
				<button type="button" class="btn btn-warning cancel">Cancel</button>
				<div class="form-group danger"></div>
			{{ Form::close() }}
		</div>

		<!-- Email -->
		<div class="showback">
			<span id="to-be-changed">{{ Auth::user()->email }}</span>
			<a class="change" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
			{{ Form::open(array('route' => 'change-admin-email', 'id' => 'change-admin-email-form', 'class' => 'form-inline')) }}
				<div class="form-group">
					<input type="email" value="{{ Auth::user()->email }}" change="Email" class="form-control" id="new-value" plaeholder="Enter Email">
				</div>
				<input type="submit" class="btn btn-primary" value="Save">
				<button type="button" class="btn btn-warning cancel">Cancel</button>
				<div class="form-group danger"></div>
			{{ Form::close() }}
		</div>

		<!-- Name -->
		<div class="showback">
			<span id="to-be-changed">{{ Auth::user()->name }}</span>
			<a class="change" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
			{{ Form::open(array('route' => 'change-admin-name', 'id' => 'change-admin-name-form', 'class' => 'form-inline')) }}
				<div class="form-group">
					<input type="text" value="{{ Auth::user()->name }}" change="Name" class="form-control" id="new-value" plaeholder="Enter Email">
				</div>
				<input type="submit" class="btn btn-primary" value="Save">
				<button type="button" class="btn btn-warning cancel">Cancel</button>
				<div class="form-group danger"></div>
			{{ Form::close() }}
		</div>
	</div>

@stop