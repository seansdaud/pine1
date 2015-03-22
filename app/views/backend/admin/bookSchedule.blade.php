
@extends("backend.layout.main")

@section("content")
 @if($nos == 1)
 <h1 class="heading">Choose Username For Booking</h1>
<div class="panel-body">
	{{ Form::open(array('route' => 'prebookschedule','class'=>'form-horizontal row-fluid','id' => 'myform' ,'files'=>true, 'method'=>'post')) }}
		<div class="form-group ">
			<label for="username">Provide valid Username:</label>
		</div>
		<div class="form-group ">
			<input type="text" name="user" class="form-control" placeholder="Choose User" id="searchmem" required>
			</br>
			<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
			<input type="hidden" name="which" value="1">
			<input type ="submit" value="Book" id="btn_book" class="btn btn-primary">
			</br>
	</div>
		{{ Form::close() }}
</div>
<div id="display"></div>
<div class="id"></div>
 @else
 @endif
 @stop