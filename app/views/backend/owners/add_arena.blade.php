@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
		<li class="active">Arena Info</li>
	</ol>

	<form action="{{ URL::route('add-arena-post') }}" method="post" class="form-horizontal" data-toggle="validator" id="add-arena-form" enctype='multipart/form-data'>

		<div class="form-group">
			<label class="col-sm-2 control-label">Banner</label>
			<div class="col-sm-10">
				<?php if(!empty($info->banner)): ?>
					<img src="{{ asset('assets/img/arena/thumb/'.$info->banner) }}">
				<?php endif; ?>
				<input type="file" name="banner" accept="image/gif, image/jpeg, image/png">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" value="{{ $info->name }}" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('name'))
					{{ $errors->first('name') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Address</label>
			<div class="col-sm-6">
				<input type="text" name="address" class="form-control" value= "{{ $info->address }}" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('address'))
					{{ $errors->first('address') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Telephone</label>
			<div class="col-sm-6">
				<input type="number" maxlength="10" data-minlength="9" name="phone" class="form-control" value="{{ $info->phone }}" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('phone'))
					{{ $errors->first('phone') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<textarea name="about" id="about">{{$info->about}}</textarea>
			</div>
			<script type="text/javascript">
				CKEDITOR.replace('about');
			</script>
		</div>

		<div class="form-group">
			<input type="submit" value="update" class="col-sm-offset-2 btn btn-default">
		</div>
		{{ Form::token() }}
	</form>

@stop