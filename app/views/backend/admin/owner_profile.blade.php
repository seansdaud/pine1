@extends("backend.layout.main")

@section("content")
	<div>{{ $owner->name }}</div>
	<div>{{ $owner->username }}</div>
	<div>{{ $owner->email }}</div>
	<div>{{ date("d M Y h:m", strtotime($owner->created_at)) }}</div>

@stop