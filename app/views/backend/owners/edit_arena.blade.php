@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('add-arena-info') }}">Arenas</a></li>
		<li class="active">{{ucfirst($info->name)}}</li>
	</ol>

	<form action="{{ URL::route('arena-info-edited') }}" method="post" class="form-horizontal" data-toggle="validator">
		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" value="{{$info->name}}" class="form-control" placeholder="Name of your arena" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Address</label>
			<div class="col-sm-6">
				<input type="text" name="address" value="{{$info->address}}" class="form-control" placeholder="Adress of your arena" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Telephone</label>
			<div class="col-sm-6">
				<input type="number" maxlength="10" value="{{$info->phone}}" data-minlength="9" name="phone" class="form-control" placeholder="Contact Number" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
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

		<input type="hidden" value="{{ $info->id }}" name="arena_id">
		<div class="form-group">
			<input type="submit" value="Update" class="col-sm-offset-2 btn btn-default">
		</div>
		{{ Form::token() }}
	</form>

@stop