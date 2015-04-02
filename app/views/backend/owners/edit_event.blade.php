@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('owner-events') }}">Events</a></li>
	    <li class="active">{{ ucfirst($event->name) }}</li>
	</ol>

	{{ Form::open(array('route' => 'owner-event-edit-post', 'class'=>'form-horizontal', 'data-toggle'=>'validator')) }}

		<div class="form-group">
			<label class="col-sm-2 control-label">Master</label>
			<div class="col-sm-6">
				<select class="form-control select-master" name="master" data-placeholder="Select User who controls this event" required>
				<option></option>
					@foreach($users as $user)
						<option value="{{ $user->id }}" <?php if($user->id == $event->user_id): ?> selected="selected" <?php endif; ?>>{{ $user->username }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<input type="hidden" value="{{ $event->id }}" name="id">

		<div class="form-group">
			<div class="col-sm-offset-2">
				<input type="submit" class="btn btn-default" value="Update">
			</div>
		</div>

	{{ Form::close() }}

@stop