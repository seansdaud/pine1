@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('owner-events') }}">Events</a></li>
	    <li class="active">Create New</li>
	</ol>

	{{ Form::open(array('route' => 'owner-events-post', 'class'=>'form-horizontal', 'data-toggle'=>'validator')) }}

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" placeholder="Name of your event" class="form-control" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Arena</label>
			<div class="col-sm-6">
				<select class="form-control select-arena" name="arena" data-placeholder="Select Arena for the event" required>
					@foreach($arenas->arenas as $arena)
						<option value="{{$arenas->arenas->id}}">{{$arenas->arenas->name}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Master</label>
			<div class="col-sm-6">
				<select class="form-control select-master" name="master" data-placeholder="Select User who controls this event">
				<option></option>
					@foreach($users as $user)
						<option value="{{ $user->id }}">{{ $user->username }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2">
				<input type="submit" class="btn btn-default" value="Add">
			</div>
		</div>

	{{ Form::close() }}

@stop