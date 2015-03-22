@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
	    <li class="active">Arenas</li>
	    <li><a href="{{ URL::route('add-new-arena') }}">Add New</a></li>
	</ol>
	Here goes the available arenas.

@stop