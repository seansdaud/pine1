@extends("frontend.layout.main")

@section("content")
	
	@if(!empty($user))
	<div class="row">
		<div class="col-md-4 col-sm-4">
		<div class="profile-wrap">
			@if(Auth::user()->image != "")
				<img class="img-profile img-circle" src="{{ asset('assets/img/profile/user/thumb/'.Auth::user()->image) }}">
			@else
				<img class="img-profile img-circle" src="{{ asset('assets/img/5457227d9719a.jpg') }}">
			@endif
			<div style="  margin-top: 25px;">
				<table class="table">
				  <tr>
				  	<td>Name :</td>
				  	<td>{{ $user->name }}</td>
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
		</div>
		<div class="col-md-8 col-sm-8">
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