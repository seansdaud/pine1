@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
		<li class="active">Events</li>
	    <li><a href="{{ URL::route('owner-event-new') }}">Create New</a></li>
	</ol>

	@if(!empty($events))
		<table class="table">
			<tr>
				<th>Name</th>
				<th>Manager</th>
				<th></th>
				<th></th>
			</tr>
			@foreach($events as $event)
				<tr>
					<td>{{ $event->name }}</td>
					<td>
						<?php $manager = User::where("id", "=", $event->user_id)->firstOrFail(); ?>
						{{ $manager->name }} / {{ $manager->username }}
					</td>
					<td>
						<a href="{{ URL::route('owner-event-edit', $event->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a>
					</td>
					<td>
						<?php if (($event->deleted_at)==NULL):?>
						<a href="{{ URL::route('owner-event-delete', $event->id) }}" class="btn btn-info"><i class="fa fa">Hide</i></a>
						<?php else: ?>
						<a href="{{ URL::route('owner-event-show', $event->id) }}" class="btn btn-info"><i class="fa">Show</i></a>
						
						<?php endif; ?>
					</td>
					<td>
					<a href="{{ URL::route('owner-event-delete-all', $event->id) }}" class="btn btn-info"><i class="fa">Delete Completely</i></a>
				
					</td>

				</tr>
			@endforeach
		</table>
	@endif

@stop