

@extends("backend.layout.main")

@section("content")
	<div class="panel-body"> 
	{{ Form::open(array('route' => 'addSchedule', 'class'=>'form-horizontal row-fluid','id' => 'myform' ,'files'=>true, 'method'=>'post')) }}
		<div class="span3">

			<div class="control-group">
				<input type="text" id="start_time" name="start_time" placeholder="Starting Time" class="span12" required>
			</div>

		</div>

		<div class="span3">
			<div class="control-group">
				<input type="text" id="end_time" name="end_time" placeholder="Ending Time" class="span12" required>
			</div>
		</div>

		<div class="span2">
			<div class="control-group">
			<div class="submit">
				 <input name="create" type="button" class="btn btn-primary" value="Create Schedule" required>
			</div>
			</div>
		</div>
		<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
		<div id="time"></div>
		<div id="checked" class="span4">
			<div class="checkbox">
			    <label>
					<input type='checkbox' id='checker'/>Type all
				</label>
			</div>
		</div>
		<div id="result"></div>
		<div id="submit" ></div>
	{{ Form::close() }}
</div>

@stop