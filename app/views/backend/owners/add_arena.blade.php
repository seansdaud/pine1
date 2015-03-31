@extends("backend.layout.main")

@section("content")
	<ol class="breadcrumb">
		<li class="active">Arenas</li>
	</ol>

	<form action="{{ URL::route('add-arena-post') }}" method="post" class="form-horizontal" data-toggle="validator" id="add-arena-form">

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" placeholder="Name of your arena" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('name'))
					{{ $errors->first('name') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Address</label>
			<div class="col-sm-6">
				<input type="text" name="address" class="form-control" placeholder="Adress of your arena" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('address'))
					{{ $errors->first('address') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Telephone</label>
			<div class="col-sm-6">
				<input type="number" maxlength="10" data-minlength="9" name="phone" class="form-control" placeholder="Contact Number" required>
			</div>
			<div class="col-sm-4 help-block with-errors">
				@if($errors->has('phone'))
					{{ $errors->first('phone') }}
				@endif
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<textarea name="about" id="about"></textarea>
			</div>
			<script type="text/javascript">
				CKEDITOR.replace('about');
			</script>
		</div>

		<div class="form-group">
			<input type="submit" value="Add" class="col-sm-offset-2 btn btn-default">
		</div>
		{{ Form::token() }}
	</form>
	<a href="#" id="add-arena-form-open">Add Arena</a>
	<a href="#" id="add-arena-form-close">Close</a>

	@if(!empty($info))
		<table class="table">
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
			@foreach($info as $row)
				<tr>
					<td><a href="{{ URL::route('edit-arena-info',$row->id) }}">{{ $row->name }}</a></td>
					<td>{{ ucfirst($row->address) }}</td>
					<td>
						<?php $chars = substr($row->phone, 0, 2); ?>
						<?php $chars3 = substr($row->phone, 0, 3); ?>
						<?php if($chars=="98"): ?>
							<?php echo "+977 - ".$row->phone; ?>
						<?php elseif($chars=="01" && $chars3!="010"): ?>
							<?php echo "+977 - ".$chars." - ".substr($row->phone, 2, strlen($row->phone)); ?>
						<?php else: ?>
							<?php echo "+977 - ".$chars3." - ".substr($row->phone, 3, strlen($row->phone)); ?>
						<?php endif; ?>
					</td>
					<td>Action</td>
				</tr>
			@endforeach
		</table>
	@endif

@stop