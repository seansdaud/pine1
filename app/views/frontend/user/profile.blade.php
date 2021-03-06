@extends("frontend.layout.main")

@section("content")
	
	<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:15px;">
		<div class="row" >
			<div class="col-md-6 col-sm-6">
				@if(Auth::user()->cover_pic != "")
					<img class="arena-banner" src="{{ asset('assets/img/profile/user/cover/'.Auth::user()->cover_pic) }}">
				@else
					<img class="arena-banner" src="{{ asset('assets/img/stadium.jpg') }}">
				@endif
				<?php if(Auth::check()): ?>
					<?php if(Auth::user()->username == $user->username): ?>
						{{ Form::open(array('route' => 'change-user-cover-picture', 'files' => true, 'id'=>'change-user-cover-pic')) }}
							<a class="choose change">
								<span class="change-text">Edit Cover</span>
								<input type="file" name="cover" id="change-cover-pic" accept="image/gif, image/jpeg, image/png" required/>
							</a>
						{{ Form::close() }}
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 col-sm-6">
				<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
				<span style="  display: block !important; position: absolute !important; width: 0 !important;  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px;   top: 148px;"></span>
				
				@if($user->image != "")
					<img class="img-profile img-circle" src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->image) }}">
				@else
					<img class="img-profile img-circle" src="{{ asset('assets/img/5457227d9719a.jpg') }}">
				@endif
				<div class="arena-wrapper">
					<div class="arena-top">{{ $user->name }}</div>
					<div style="color:white; font-family:'Titillium Web', sans-serif;">
					<span style="color:#F43C12;">>>  </span>{{ $user->users_daily }}<span style="color:#F43C12;">  //</span>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-4" style="  box-shadow: 4px 19px 16px #888888;">
		<div class="row">
			<div class="col-md-7">
				<div class="cat-name">
	                <span class="base schedule">Personal info</span>
	                <span class="arrow"></span>
                </div>
			</div>
		</div>
		
		<div class="profile-wrap">
			<div style="  margin-top: 25px;">
				<table class="table">
				  <tr>
				  	<td>Username :</td>
				  	<td>{{ $user->username }}</td>
				  </tr>
				  <tr>
				  	<td>Email :</td>
				  	<td>{{ $user->email }}</td>
				  </tr>
				  <tr>
				  	<td>Address :</td>
				  	<td>{{$user->address}}</td>
				  </tr>
				  <tr>
				  	<td>Contact No :</td>
				  	<td>{{ $user->contact }}</td>
				  </tr>
				</table>
			</div>
			<?php if(Auth::check()): ?>
				<?php if(Auth::user()->username == $user->username): ?>
				<div class="profile-edit">
					<!-- <a href="{{ URL::route('change-profile') }}"><span class="glyphicon glyphicon-edit"></span></a> -->
					<!-- Button trigger modal -->
					<a href="#" data-toggle="modal" data-target="#myModal">
					  <span class="glyphicon glyphicon-edit"></span>
					</a>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="color:black;">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header" style="background: #15212F; color: rgb(218, 215, 215);">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
					      </div>
					      <div class="modal-body" style="rgb(231, 231, 231);">
					        <form action="{{ URL::route('update-profile-post') }}" method="post" class="form-horizontal" data-toggle="validator" enctype='multipart/form-data'>
								<div class="form-group">
									<label class="col-sm-2 control-label">Change picture</label>
									<div class="col-sm-6">
										<input type="file" name="image" class="form-control" accept="image/gif, image/jpeg, image/png">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Yours Today</label>
									<div class="col-sm-6">
										<input type="text" name="users_daily" class="form-control" value="{{ Auth::user()->users_daily }}" required>
									</div>
									<div class="col-sm-4 help-block with-errors">
										@if($errors->has('users_daily'))
											{{ $errors->first('users_daily') }}
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Name</label>
									<div class="col-sm-6">
										<input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
									</div>
									<div class="col-sm-4 help-block with-errors">
										@if($errors->has('name'))
											{{ $errors->first('name') }}
										@endif
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Email</label>
									<div class="col-sm-6">
										<input type="email" name="email" class="form-control" value= "{{ Auth::user()->email }}" required>
									</div>
									<div class="col-sm-4 help-block with-errors">
										@if($errors->has('email'))
											{{ $errors->first('email') }}
										@endif
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Contact</label>
									<div class="col-sm-6">
										<input type="number" maxlength="10" data-minlength="9" name="contact" class="form-control" value="{{ Auth::user()->contact }}" required>
									</div>
									<div class="col-sm-4 help-block with-errors">
										@if($errors->has('contact'))
											{{ $errors->first('contact') }}
										@endif
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-6">
										<input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
									</div>
									<div class="col-sm-4 help-block with-errors">
										@if($errors->has('contact'))
											{{ $errors->first('contact') }}
										@endif
									</div>
								</div>
								<div class="modal-footer" style="  background: rgb(21, 33, 47);">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Save changes</button>
							    </div>
								{{ Form::token() }}
							</form>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div>
			<div class="row">
				<div class="col-md-7">
					<div class="cat-name">
		                <span class="base schedule" style="margin-bottom:10px;">Book logs</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<div class="logs">
				@foreach($token as $row)
					<div style="  border-bottom: 1px solid white; padding: 2px;">
						<?php $arena=Arena::where("id", "=", $row->arena_id)->first(); ?>
						<div style="  padding-top: 3px; color: rgb(21, 33, 47);">{{$arena->name}}</div>
						<!-- <span class="times">19</span> -->
						<div class="badges">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								Booked: {{$row->booking_points}}
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<?php if(!$arena->booking_points==null): ?>
									<?php $badge=intval($row->booking_points/$arena->booking_points); ?>
									 Free Booking: {{$badge}}
								<?php endif; ?>
							</div>
						</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		</div>
		<div class="col-md-8 col-sm-8">
			<div class="row" style="margin-bottom:10px;">
				<div class="col-md-4">
					<div class="cat-name">
						<span class="base schedule">Your Events</span>
						<span class="arrow"></span>
					</div>
				</div>
			</div>
			<?php $row_closed=null; $i=0; foreach($user->events as $events): $i++; ?>

				<?php if($i==1): $row_closed=false; ?>
					<div class="row">
				<?php endif; ?>
				<div class="col-md-4 col-sm-4">
					<div class="item2">
					  	<a href="{{ URL::route('edit-event', $events->id) }}"><div class="event-eve">{{$events->name}}</div></a>
					  	<div style="  padding: 5px 6%;">
					  		<div class="feb-bind">
								<span class="feb">{{date("M",strtotime($events->start))}}</span><br>
								<span class="date">{{date("d",strtotime($events->start))}}</span>
							</div>
							<div class="wrapper-eve">
								<div><span class="glyphicon glyphicon-time"></span>
									5:00 Am - 3:00 Pm
								</div>
								<div><span class="glyphicon glyphicon-map-marker"></span>
									<?php $arena = User::find($events->owner_id)->arena()->first(); ?>
									{{$arena->name}}
								</div>
								<?php if(Auth::check()): ?>
									<?php if(Auth::user()->id == $user->id): ?>
									<div>
										<a href="{{ URL::route('edit-event', $events->id) }}" data-toggle="tooltip" title="Edit Event"><button type="button" class="btn btn-primary btn-events"><span class="glyphicon glyphicon-edit"></span>Edit</button></a>
									</div>
									<?php endif; ?>
								<?php endif; ?>
							</div>
					  	</div>
					</div>
				</div>
				<?php if($i==3): $row_closed=true; $i=0; ?>
						</div>
					<?php endif; ?>

				<?php endforeach; ?>
				<?php if($row_closed==false || $row_closed==null): ?>
					</div>
				<?php endif; ?>
			<div class="row">
				<div class="col-md-3">
					<div class="cat-name">
	                <span class="base schedule">History</span>
	                <span class="arrow"></span>
                </div>
				</div>
			</div>
			<section class="comments">
				@foreach($user->bookings as $book)
				<article class="comment">
					<a class="comment-img" href="#non">
						@if(Auth::user()->image != "")
							<img src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->image) }}" alt="" width="50" height="50">
						@else
							<img class="img-profile img-circle" src="{{ asset('assets/img/5457227d9719a.jpg') }}" alt="" width="50" height="50">
						@endif
					</a>
					<?php $arena=User::where('id','=', $book->arena_id)->first();
									
										?>
					<?php $time=Scheduleinfo::where('booking_id','=',$book->id)->first();?>
					<div class="comment-body">
						<div class="text">
						  <p>You booked <a href="{{ URL::route('arena-detail', $arena->arena->id) }}">{{ $arena->arena->name }}</a> from {{ $time->start_time }} to {{$time->end_time}} for {{$book->booking_date}}.</p>
						</div>
						<p class="attribution">On {{ date("H:m:s", strtotime($book->created_at)); }}, {{ date("Y-M-d", strtotime($book->created_at)) }}</p>
					</div>
				</article>
				@endforeach
			</section>​
		</div>
	</div>

@stop