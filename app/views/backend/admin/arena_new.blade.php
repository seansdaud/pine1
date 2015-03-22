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
				<input type="text" name="name" placeholder="Enter Arena Name" class="form-control" required>
			</div>
			<div class="col-sm-4 help-block with-errors"></div>
		</div>

		

	{{ Form::close() }}

@stop