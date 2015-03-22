@extends('backend.layout.main')

@section("content")
	<ol class="breadcrumb">
	    <li class="active">Owners</li>
	    <li><a href="{{ URL::route('create-new-owner') }}">Create New</a></li>
	</ol>
		<div class="action-buttons">
			<a href="{{ URL::route('delete-owner') }}" class="btn btn-default" name="delete">Delete</a>
			<a href="{{ URL::route('disable-owner') }}" class="btn btn-default" name="disable">Disable</a>
			<a href="{{ URL::route('enable-owner') }}" class="btn btn-default" name="enable">Enable</a>
			<a href="{{ URL::route('restore-owner') }}" class="btn btn-default" name="restore">Restore</a>
			<a data-toggle="modal" href="#" data-target="#remove-owner" class="btn btn-default" name="deletef">Delete Forever</a>
			<div class="modal fade" id="remove-owner" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
			                <div style="font-size:20px; color:#c9302c; text-align:center;">Delete Owner?</div>
			            </div>
			            <div class="modal-body">
			                Everyting related to this owner will be removed permanently. Are you sure?
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			                <a href="{{URL::route('remove-owner')}}" class="btn btn-danger">Yes</a>
			            </div>
					</div>
				</div>
			</div>
		</div>
	<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active"><a href="#active" role="tab" data-toggle="tab">Active</a></li>
		  <li role="presentation"><a href="#disabled" role="tab" data-toggle="tab">Disabled</a></li>
		  <li role="presentation"><a href="#trashed" role="tab" data-toggle="tab">Trashed</a></li>
	</ul>

	<form name="owners" method="post" action="">
		{{ Form::token() }}
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="active">
				<table class="table check">
					<tr>
						<th><input type="checkbox" class="all" /></th>
						<th>Arena</th>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Created</th>
					</tr>

					@foreach($active as $owner)
						<tr>
							<td>
								<input name="id[]" type="checkbox" value="<?php echo $owner->id; ?>">
							</td>
							<td>Pokhara Futsal Arena</td>
							<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->name }}</a></td>
							<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->username }}</a></td>
							<td>{{ $owner->email }}</td>
							<td>
								{{ date("d M Y", strtotime($owner->created_at)) }}
							</td>
						</tr>
					@endforeach
					
				</table>
			</div>

			<div role="tabpanel" class="tab-pane fade" id="disabled">
				<table class="table check">
					<tr>
						<th><input type="checkbox" class="all" /></th>
						<th>Arena</th>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Created</th>
					</tr>

					@foreach($disabled as $owner)
						<tr>
							<td>
								<input name="id[]" type="checkbox" value="<?php echo $owner->id; ?>">
							</td>
							<td>Pokhara Futsal Arena</td>
							<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->name }}</a></td>
							<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->username }}</a></td>
							<td>{{ $owner->email }}</td>
							<td>
								{{ date("d M Y", strtotime($owner->created_at)) }}
							</td>
						</tr>
					@endforeach
					
				</table>
			</div>

			<div role="tabpanel" class="tab-pane fade" id="trashed">
				<table class="table check">
					<tr>
						<th><input type="checkbox" class="all" /></th>
						<th>Arena</th>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Trashed</th>
					</tr>

					@foreach($trashed as $owner)
						<tr>
							<td>
								<input name="id[]" type="checkbox" value="<?php echo $owner->id; ?>">
							</td>
							<td>Pokhara Futsal Arena</td>
							<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->name }}</a></td>
							<td><a href="{{ URL::route('admin-owner-profile', $owner->username) }}">{{ $owner->username }}</a></td>
							<td>{{ $owner->email }}</td>
							<td>
								{{ date("d M Y", strtotime($owner->deleted_at)) }}
							</td>
						</tr>
					@endforeach
					
				</table>
			</div>
		</div>
	</form>

@stop