

@extends("backend.layout.main")

@section("content")
<?php 	
	$adminid = Auth::id();
$schedular=Schedule::where('admin_id', $adminid )->get();
 ?>
@if($schedular->isEmpty())
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
@else
	<div class="panel-body"> 
	
		<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
<div class="panel-body"><div id="id"></div>
<div id="time"></div>
	
	<table id='mytable' class="table table-striped table-bordered table-condensed table-hover" border="3" width="100%" name='futsal-table'>
													
		<tr class="danger">
			<td name='time'><span class="day">Time</span></td>
			<td name='sunday'><span class="day">Sunday</span></td>
			<td name='monday'><span class="day">Monday</span></td>
			<td name='tuesday'><span class="day">Tuesday</span></td>
			<td name='wednesday'><span class="day">Wednesday</span></td>
			<td name='thrusday'><span class="day">Thrusday</span></td>
			<td name='friday'><span class="day">Friday</span></td>
			<td name='saturday'><span class="day">Saturday</span></td>
		</tr>
	
	<div class="up">
		
	</div>
		<?php if (!empty($schedular)): ?>
			<?php $time=$schedular[0]->time_diff; ?>
			<input type='hidden' name='diff' value='<?php echo $time; ?>'>
		<?php endif; ?>
		<?php $i=0; ?>
		<?php $j=0; ?>
		<?php $c=0; ?>

		<?php foreach ($schedular as $key ): ?>
			<?php $i++;?>
			<?php $c++;?>
			<?php if($i==1) : ?>
					<div class="row">
				<tr class="success">
				<td name='time' class="tdbig" style="width:17%;">
					<?php echo $key->start_time; ?> to <?php echo $key->end_time; ?>
				</td>
				<td ><input type='number' step='any' class="span12 copy" name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></td>
				<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
				<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
				<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
			<?php elseif ($i==7): ?>
					<td ><span><input type='number' step='any' class="span12 copy" name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></span></td>
					<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
					<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
					<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
					</tr>
						</div>	
					<?php $i=0; ?>
					<?php $j++;?>
			<?php elseif ($i<8) : ?>
				<td ><span><input type='number' step='any' class="span12 copy" name='<?php echo $i; echo $j; ?>' value='<?php echo $key->price; ?>' ></span></td>
				<input type='hidden' name='id<?php echo $c; ?>' value='<?php echo $key->id; ?>'>
				<input type='hidden' name='start_time<?php echo $c; ?>' value='<?php echo $key->start_time; ?>'>
				<input type='hidden' name='end_time<?php echo $c; ?>' value='<?php echo $key->end_time; ?>'>
			
			<?php endif; ?>
		<?php endforeach; ?>
	<tr>
		<td colspan="8" >
		{{ Form::open(array( 'route' => 'addscheduledown','class'=>'form-horizontal row-fluid', 'method'=>'post')) }}
			<input type='hidden' name='diff' value='<?php echo $time; ?>'>
			<input type='hidden' name='start_timedown' value='<?php echo $key->start_time; ?>'>
			<input type='hidden' name='end_timedown' value='<?php echo $key->end_time; ?>'>
				<button type="submit" class="btn btn-theme02 btn-primary"><i class="fa fa-cog"></i>Add</button>
		
		{{ Form::close() }}
		{{ Form::open(array( 'route' => 'delscheduledown','class'=>'form-horizontal row-fluid', 'method'=>'post')) }}
			<input type='hidden' name='start_timedown' value='<?php echo $key->start_time; ?>'>
			<input type='hidden' name='end_timedown' value='<?php echo $key->end_time; ?>'>
				<button type="submit" class="btn btn-theme01 btn-danger"><i class="fa fa-check"></i> Delete</button>
		{{ Form::close() }}
		</td>
	</tr>
	</table>
</div>

</div>
@endif
@stop