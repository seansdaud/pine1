@extends("backend.layout.main")

@section("content")
	<form action="{{ URL::route('arena-info-edited') }}" method="post">
		<div class="field">
			enter title:<input type="text" name="name" value="{{ $info->name }}" >
			@if($errors->has('name'))
				{{ $errors->first('name') }}
			@endif
		</div>
		<div class="field">
			Address:<input type="text" name="address" value="{{ $info->address }}">
		</div>
		@if($errors->has('address'))
				{{ $errors->first('address') }}
			@endif
		<div class="field">
			Telephone:<input type="number" name="phone" value="{{ $info->phone }}">
		</div>
		@if($errors->has('phone'))
				{{ $errors->first('phone') }}
			@endif
		<div class="field">
			description:<input type="text" name="about" value="{{ $info->about }}" name="arena_id">
		</div>
		<input type="hidden" value="{{ $info->id }}" name="arena_id">
		<input type="submit" value="update">
		{{ Form::token() }}
	</form>
@stop