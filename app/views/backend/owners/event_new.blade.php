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
			<label class="col-sm-2 control-label">Master</label>
			<div class="col-sm-6">
				<select class="form-control select-master" name="master" data-placeholder="Select User who controls this event" required>
				<option></option>
					@foreach($users as $user)
						<option value="{{ $user->id }}">{{ $user->username }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<h1>Date:</h1>
		<div class="form-group">
			<label class="col-sm-2 control-label">From</label>
			<div class="col-sm-6">
				<input type="date" name="getdate1"class="span12 date" placeholder="Choose Date" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">To</label>
			<div class="col-sm-6">
				<input type="date" name="getdate2"  class="span12 date" placeholder="Choose Date" >
				
			</div>
		</div>
			<h1>Time:</h1>
		<div class="form-group">
			<label class="col-sm-2 control-label">From</label>
			<div class="col-sm-6">
				<input type="text" class="start_timeon" name="start_time1" placeholder="Starting Time" class="span12" required>
			
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">To</label>
			<div class="col-sm-6">
				<input type="text" class="start_timeon" name="end_time1" placeholder="Ending Time" class="span12" required>
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-2">
				<input type="submit" class="btn btn-default" value="Add">
			</div>
		</div>

	{{ Form::close() }}

@stop