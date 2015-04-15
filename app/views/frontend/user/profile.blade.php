@extends("frontend.layout.main")

@section("content")
	
	<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:15px;">
		<div class="row" >
			<div class="col-md-6 col-sm-6">
				@if(Auth::user()->cover_pic != "")
					<img class="img-profile img-circle" src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->cover_pic) }}">
				@else
					<img class="arena-banner" src="{{ asset('assets/img/stadium.jpg') }}">
				@endif
				<a href="#"><span class="cover-change">Edit Cover</span></a>
				<?php if(Auth::check()): ?>
					<?php if(Auth::user()->username == $user->username): ?>
						<a href="#"><span class="cover-change">Edit Cover</span></a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 col-sm-6">
				<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
				<span style="  display: block !important; position: absolute !important; width: 0 !important;  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; bottom: -77px;"></span>
				
				@if($user->image != "")
					<img class="img-profile img-circle" src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->image) }}">
				@else
					<img class="img-profile img-circle" src="{{ asset('assets/img/5457227d9719a.jpg') }}">
				@endif
				<div class="arena-wrapper">
					<div class="arena-top">{{ $user->name }}</div>
					<div style="color:white; font-family:'Titillium Web', sans-serif;">
					<span style="color:#F43C12;">>>  </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<span style="color:#F43C12;">  //</span>
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
		                <span class="base schedule">Book logs</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<div class="logs">
				<div style="  border-bottom: 1px solid white; padding: 2px;">
					<div style="  padding-top: 3px; color: rgb(21, 33, 47);">pokhara futsal arena</div>
					<!-- <span class="times">19</span> -->
					<div class="badges">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							Booked: 10
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							Badges: 6
						</div>
					</div>
					</div>
				</div>
				<div style="  border-bottom: 1px solid white; padding: 2px;">
					<div style="  padding-top: 3px; color: rgb(21, 33, 47);">pokhara futsal arena</div>
					<!-- <span class="times">19</span> -->
					<div class="badges">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							Booked: 10
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							Badges: 6
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="col-md-8 col-sm-8">
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