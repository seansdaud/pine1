@extends("backend.layout.main")

@section("content")
	<form action="{{ URL::route('add-location-post') }}" method="post" class="form-horizontal" data-toggle="validator">
		<div class="form-group">
			<label class="col-sm-2 control-label">Select Zone</label>
			<div class="col-sm-6">
				<select id="country" name ="zone"></select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Choose District</label>
			<div class="col-sm-6">
				<select id="state" name ="district"></select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">City</label>
			<div class="col-sm-6">
				<input type="text" name="city" required>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
		{{ Form::token() }}
	</form>
@stop