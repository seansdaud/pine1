@extends('backend.layout.main')

@section("content")
	<div style="text-align:center; margin-bottom:15px;">
		<a href="{{ URL::route('create-new-owner') }}" class="btn btn-default" style="width: 95%;font-weight: bold;color: #867D7D;">Create New</a>
	</div>
	<table class="table table-stripped">
		<tr>
			<th>Arena</th>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Status</th>
		</tr>
		
		@foreach($owners as $owner)
			<tr>
				<td>Pokhara Futsal Arena</td>
				<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->name }}</a></td>
				<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->username }}</a></td>
				<td>{{ $owner->email }}</td>
				<td>
					@if($owner->active == 1)
						{{ "active" }}
					@else
						{{ "disabled" }}
					@endif
				</td>
			</tr>
		@endforeach
		
	</table>

@stop