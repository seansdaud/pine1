@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
		<li class="active">Events</li>
	    <li><a href="{{ URL::route('owner-event-new') }}">Create New</a></li>
	</ol>

@stop