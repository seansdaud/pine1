@extends("backend.layout.main")

@section("content")

	<form action="{{ URL::route('image-upload-post') }}" enctype="multipart/form-data" method="post" class="form-horizontal" data-toggle="validator">

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="file" name="image" class="form-control" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('name'))
					{{ $errors->first('name') }}
				@endif
			</div>
		</div>
		<div class="form-group">
			<input type="submit" value="update" class="col-sm-offset-2 btn btn-default">
		</div>
		{{ Form::token() }}
	</form>

@stop