@extends("frontend.layout.main")

@section("content")
	
	@if(!empty($user))
	<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:15px;">
		<div class="row" >
			<div class="col-md-6 col-sm-6">
				<img class="arena-banner" src="{{ asset('assets/img/stadium.jpg') }}">
			</div>
			<div class="col-md-6 col-sm-6">
				<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
				<span style="  display: block !important; position: absolute !important; width: 0 !important;  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; bottom: -77px;"></span>
				
				<img class="img-profile img-circle" src="{{ asset('assets/img/ui-zac.jpg') }}">
				
				<div class="arena-wrapper">
					<div class="arena-top">Prachanda Gurung</div>
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
			@if(Auth::user()->image != "")
				<img class="img-profile img-circle" src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->image) }}">
			@else
				<img class="img-profile img-circle" src="{{ asset('assets/img/5457227d9719a.jpg') }}">
			@endif
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
			<div>
				<a href="{{ URL::route('change-profile') }}">edit</a>
			</div>
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
				<div style="  border-bottom: 1px solid white; height: 40px; padding: 2px;">
					<span style="  padding-top: 3px;">pokhara futsal arena</span>
					<span class="times">19</span>
				</div>
				<div style="  border-bottom: 1px solid white; height: 40px; padding: 2px;">
					<span style="  display: inline-block;">pokhara futsal arena</span>
					<span class="times">19</span>
				</div>
			</div>
		</div>
		</div>
		<div class="col-md-8 col-sm-8">
			<div class="row">
				<div class="col-md-3">
					<div class="cat-name">
	                <span class="base schedule">history</span>
	                <span class="arrow"></span>
                </div>
				</div>
			</div>
			<section class="comments">
				@foreach($booking as $book)
				<article class="comment">
					<a class="comment-img" href="#non">
						@if(Auth::user()->image != "")
							<img src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->image) }}" alt="" width="50" height="50">
						@else
							<img class="img-profile img-circle" src="{{ asset('assets/img/5457227d9719a.jpg') }}" alt="" width="50" height="50">
						@endif
					</a>
					<? $arena=User::where('id','=', $book->arena_id)->firstOrFail();?>
					<? $time=Scheduleinfo::where('booking_id','=',$book->id)->firstOrFail();?>
					<div class="comment-body">
						<div class="text">
						  <p>You booked <a href="#">{{ $arena->arenas->name }}</a> from {{ $time->start_time }} to {{$time->end_time}}</p>
						</div>
						<p class="attribution">On {{ date("H:m:s", strtotime($book->created_at)); }}, {{ $book->booking_date }}</p>
					</div>
				</article>
				@endforeach
			</section>​
		</div>
	</div>
	@else
		User not available

	@endif

@stop