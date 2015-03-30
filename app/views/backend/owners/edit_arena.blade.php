@extends("backend.layout.main")

@section("content")
	<form action="{{ URL::route('arena-info-edited') }}" method="post">
		<div class="field">
			enter title:<input type="text" name="name" value="{{ $info->name }}" >
		</div>
		<div class="field">
			Address:<input type="text" name="address" value="{{ $info->address }}">
		</div>
		<div class="field">
			Telephone:<input type="number" name="phone" value="{{ $info->phone }}">
		</div>
		<div class="field">
			description:<input type="text" name="about" value="{{ $info->about }}" name="arena_id">
		</div>
		<input type="hidden" value="{{ $info->id }}" name="arena_id">
		<input type="submit" value="update">
		{{ Form::token() }}
	</form>
@stop