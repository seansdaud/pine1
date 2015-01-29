@extends('backend.layout.main')

@section("content")
	@foreach($owners as $owner)

		<div>{{ $owner->name }}</div>
		<div>
			{{ $owner->username }}
		</div>
		<div>
			{{ $owner->email }}
		</div>

	@endforeach

@stop