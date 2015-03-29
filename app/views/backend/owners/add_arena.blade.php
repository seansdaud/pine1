@extends("backend.layout.main")

@section("content")
	<form action="{{ URL::route('add-arena-post') }}" method="post">
		<div class="field">
			enter title:<input type="text" name="title">
			@if($errors->has('title'))
				{{ $errors->first('title') }}
			@endif
		</div>
		<div class="field">
			description:<input type="text" name="description">
			@if($errors->has('description'))
				{{ $errors->first('description') }}
			@endif
		</div>
		<input type="submit" value="create album">
		{{ Form::token() }}
	</form>
@stop