@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
	    <li><a href="{{ URL::route('owners') }}">Owners</a></li>
	    <li class="active">{{ $owner->name }}</li>
	</ol>
	<div>{{ $owner->name }}</div>
	<div>{{ $owner->username }}</div>
	<div>{{ $owner->email }}</div>
	<div>{{ date("d M Y h:m", strtotime($owner->created_at)) }}</div>

@stop