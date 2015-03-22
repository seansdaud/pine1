
@extends("backend.layout.main")

@section("content")
	<div class="panel-body"> 
	{{ Form::open(array( 'class'=>'form-horizontal row-fluid','id' => 'myform1' ,'files'=>true, 'method'=>'post')) }}
		<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
<div class="panel-body"><div id="id"></div>
<div id="time"></div>
<div class="checkbox">
    <label>
		<input type='checkbox' id='checker'/>Type all
	</label>
	</div>
	
	<table id='mytable' class="table table-striped table-bordered table-condensed table-hover" name='futsal-table'>
													
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

	</table>
	
	<input type='button' onclick='update_ajax()'  class="btn btn-primary submitsch" value='update' style="margin:15px 0px;">

</div>

<div id="message"  ></div>


	{{ Form::close() }}
</div>

@stop