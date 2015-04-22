@extends("frontend.layout.main")

@section("content")
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