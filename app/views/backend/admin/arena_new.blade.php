@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
	    <li><a href="{{ URL::route('admin-arenas') }}">Arenas</a></li>
	    <li class="active">Add New</li>
	</ol>

	{{ Form::open(array('route' => 'add-new-arena-post', 'class' => 'form-horizontal style-form', 'data-toggle' => 'validator', 'id' => 'check-duplicate', 'check-url' => URL::route('check-duplicate-arenas'))) }}

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" data-check="true" placeholder="Enter Arena Name" class="form-control" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">About</label>
			<div class="col-sm-10">
				<textarea name="about" id="about"></textarea>
				<script type="text/javascript">
					CKEDITOR.replace("about");
				</script>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2">
				<input type="submit" class="btn btn-default" value="Add">
			</div>
		</div>

	{{ Form::close() }}

@stop