@extends("frontend.layout.main")

@section("content")
	<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:20px;">
		<div class="row" >
			<div class="col-md-6 col-sm-6">
				<img class="arena-banner" src="{{ asset('assets/img/4982__1753__gerrard1000_5425b91e0e98e402487932.jpg') }}">
			</div>
			<div class="col-md-6 col-sm-6">
				<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
				<span style="  display: block !important; position: absolute !important; width: 0 !important;
	  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; bottom: -77px;"></span>
				<div class="arena-wrapper">
					<div class="arena-top">Futsal Registration</div>
					<div style="color:white; font-family:'Titillium Web', sans-serif;"><span style="color:#F43C12;">>>  </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<span style="color:#F43C12;">  //</span></div>
				</div>
			</div>
		</div>
	</div>
	{{ Form::open(array('route'=>'edit-event-post', 'class'=>'form-horizontal', 'data-toggle'=>'validator', 'files'=>true)) }}

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" value="<?php echo $event->name; ?>" class="form-control" placeholder="Event Name" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Banner</label>
			<div class="col-sm-6">
				<?php if(!empty($event->image)): ?>
					<img src="<?php echo asset('assets/img/events/thumb/'.$event->image); ?>">
				<?php endif; ?>
				<input type="file" name="image">
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Write Details</label>
			<div class="col-sm-10">
				<textarea name="details" id="detail">{{ $event->detail }}</textarea>
				<script type="text/javascript">
					CKEDITOR.replace("detail");
				</script>
			</div>
		</div>
		<input type="hidden" value="{{ $event->id }}" name="id">

		<div class="col-sm-offset-2">
			<input type="submit" value="Update" class="btn btn-primary">
		</div>

	{{ Form::close() }}


@stop