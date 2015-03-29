


@extends("backend.layout.main")

@section("content")
	{{ Form::open(array('url' => 'getLog','class'=>'form-horizontal row-fluid','id' => 'myform' ,'files'=>true, 'method'=>'post')) }}

<div class="panel-body">
	<div class="row">
		<div class="span5">
			<div class="control-group">
				<label class="control-label" for="getdate1">From:</label>
				<div class="controls">
					<input type="date" name="getdate1" id="datepick1" class="span12 date" placeholder="Choose Date" >
				</div>
			</div>
		</div>

		<div class="span5">
			<div class="control-group">
				<label class="control-label" for="getdate2">To:</label>
				<div class="controls">
					<input type="date" name="getdate2" id="datepick2" class="span12 date" placeholder="Choose Date" >
				</div>
			</div>
		</div>

		<div class="span2">
			<input type ="submit" value="View Log" class="btn btn-primary">
		</div>
	</div>
</div>

		{{ Form::close() }}


		@if(!$history->isEmpty())

<?php if (!empty($posts)): ?>
	<h2 class="media stream new-update"><a>History 
	<?php if (!empty($from)) {
		echo " From <span style='color: #4185C8;'>".$from."</span> ";
	} ?>
	<?php if (!empty($to)) {
		echo "To <span style='color: #4185C8;'>".$to."</span>";
	} ?>
	</a></h2>
<?php endif; ?>
<table class="table table table-striped table-hover" border="3">
	
<tr class="warning">
	<th>Date:</th>
	<th>Time:</th>
	<th>Booked By:</th>
	<th>Phone Number:</th>
</tr>
<?php foreach ($history as $key ) : ?>
<tr class="success">
	<td>
		<?php echo $key->booking_date; ?>
	</td>
	<td>
		<?php echo $key->scheduleinfo->start_time; ?> To 	<?php echo $key->scheduleinfo->end_time; ?>
	</td>
	<?php $user= User::where('id', $key->user_id)->get(); ?>
	<td>
		{{$user[0]->name}}
	</td>
	<td>
		{{$user[0]->contact}}
	</td>
</tr>
<?php endforeach; ?>

</table>
		@endif
	@stop