@extends("backend.layout.main")

@section("content")
	<form action="{{ URL::route('add-arena-post') }}" method="post">
		<div class="field">
			enter title:<input type="text" name="name">
			@if($errors->has('name'))
				{{ $errors->first('name') }}
			@endif
		</div>
		<div class="field">
			Address:<input type="text" name="address">
			@if($errors->has('address'))
				{{ $errors->first('address') }}
			@endif
		</div>
		<div class="field">
			Telephone:<input type="number" name="phone">
			@if($errors->has('phone'))
				{{ $errors->first('phone') }}
			@endif
		</div>
		<div class="field">
			description:<input type="text" name="about">
			@if($errors->has('about'))
				{{ $errors->first('about') }}
			@endif
		</div>
		<input type="submit" value="add">
		{{ Form::token() }}
	</form>
	@foreach($info as $row)
		<p><a href="{{ URL::route('edit-arena-info',$row->id) }}">{{ $row->name }}</a></p>
		<p>{{ $row->address }}</p>
		<p>{{ $row->phone }}</p>
		<p>{{ $row->about }}</p>
	@endforeach
@stop