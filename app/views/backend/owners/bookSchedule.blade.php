
@extends("backend.layout.main")

@section("content")
 @if($nos == 1)
 <h1 class="heading">Choose Username For Booking</h1>
<div class="panel-body">
	{{ Form::open(array('url' => '/o/prebookschedule/1','class'=>'form-horizontal row-fluid','id' => 'myform' ,'files'=>true, 'method'=>'post')) }}
			<div class="row">
						<div class="form-group ">
                              <label class="col-sm-2  control-label">Provide UserName:</label>
                              <div class="col-sm-10">
                                 	<input type="text" name="user" style="width: 21%;" class="form-control keys" placeholder="Choose User" id="searchmem" >
                              </div>
                          </div>
                          <div class="form-group ">
                              <label class="col-sm-2  control-label">Provide Contact:</label>
                              <div class="col-sm-10">
                                 	<input type="text" name="contact" style="width: 21%;" class="form-control keys"  id="searchcont" >
                              </div>
                          </div>
	</div>
			<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
			<input type="hidden" id='type' value="1">
					<input type="hidden" id='user_id' name="user_id" >
			<input type ="submit" value="Book" id="btn_book" class="btn btn-primary">
			</br>
		</div>
		{{ Form::close() }}
</div>
<div id="display"></div>
<div class="id"></div>
 @elseif($nos==2)
   <h4 class="mb"><i class="fa fa-angle-right"></i> Create Username</h4>
 	  {{ Form::open(array( 'route' => 'create_instant_user','class'=>'form-horizontal style-form', 'method'=>'post')) }}
 	  <div class="form-group">
						<label class="col-sm-2 control-label">Enter Name:</label>
			<div class="col-sm-10">
				<input type="text" name="name" class="form-control" required>
			</div>
			<label class="col-sm-2 control-label">Enter Contact No:</label>
			<div class="col-sm-10">
				<input type="text" name="contact"  class="form-control"  required>
			</div>
				<span class="help-block with-errors"></span>
			</div>
			<div class="form-group">
			<input type="submit" value="Add" class="col-sm-offset-2 btn btn-default">
			</div>
		</div>
 	  {{ Form::close() }}
 	  <h1 class="heading">Choose Name or Contact No For Booking</h1>
	<div class="panel-body">
	{{ Form::open(array('url' => '/o/prebookschedule/2','class'=>'form-horizontal row-fluid','id' => 'myform' ,'files'=>true, 'method'=>'post')) }}
	<div class="row">
						<div class="form-group ">
                              <label class="col-sm-2  control-label">Provide Name:</label>
                              <div class="col-sm-10">
                                 	<input type="text" name="user" style="width: 21%;" class="form-control keys" placeholder="Choose User" id="searchmem" >
                              </div>
                          </div>
                          <div class="form-group ">
                              <label class="col-sm-2  control-label">Provide Contact:</label>
                              <div class="col-sm-10">
                                 	<input type="text" name="contact" style="width: 21%;" class="form-control keys"  id="searchcont" >
                              </div>

                          </div>
	</div>
			<input type="hidden" id='type' value="2">
				<input type="hidden" id='user_id' name="user_id" >
			<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
			<input type ="submit" value="Book" id="btn_book" class="btn btn-primary">
	
		{{ Form::close() }}
</div>
<div id="display"></div>
<div class="id"></div>
 @endif
 @stop