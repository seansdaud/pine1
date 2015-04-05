@extends("frontend.layout.main")

@section("content")
 	<ol class="breadcrumb">
		<li class="active">Edit Profile</li>
	</ol>
	@if(Auth::user()->image != "")
		<img class="img-circle pic-profile" src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->image) }}">
	@else
		<img class="img-circle pic-profile" src="{{ asset('assets/img/5457227d9719a.jpg') }}">
	@endif
	<form action="{{ URL::route('update-profile-post') }}" method="post" class="form-horizontal" data-toggle="validator" enctype='multipart/form-data'>
		<div class="form-group">
			<label class="col-sm-2 control-label">Change Profile Picture</label>
			<div class="col-sm-6">
				<input type="file" name="image" accept="image/gif, image/jpeg, image/png">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('name'))
					{{ $errors->first('name') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-6">
				<input type="email" name="email" class="form-control" value= "{{ Auth::user()->email }}" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Contact</label>
			<div class="col-sm-6">
				<input type="number" maxlength="10" data-minlength="9" name="contact" class="form-control" value="{{ Auth::user()->contact }}" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('contact'))
					{{ $errors->first('contact') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Address</label>
			<div class="col-sm-6">
				<input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('contact'))
					{{ $errors->first('contact') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<input type="submit" value="update" class="col-sm-offset-2 btn btn-default">
		</div>
		{{ Form::token() }}
	</form>

@stop