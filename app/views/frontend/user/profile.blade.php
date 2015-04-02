@extends("frontend.layout.main")

@section("content")
	
	@if(!empty($user))
	<div class="row">
		<div class="col-md-4 col-sm-4">
		<div class="profile-wrap">
			<?php if(!empty($user->image)): ?>
				<img class="img-profile img-circle" src="{{ asset('assets/img/profile/thumb/'.$user->image) }}">
			<?php else: ?>
				<img class="img-profile img-circle" src="{{ asset('assets/img/profile.jpg') }}">
			<?php endif; ?>
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
				  	<td>Username :</td>
				  	<td>{{ $user->username }}</td>
				  </tr>
				  <tr>
				  	<td>Location :</td>
				  	<td>{{ $user->address }}</td>
				  </tr>
				  <tr>
				  	<td>Contact No :</td>
				  	<td>{{ $user->contact }}</td>
				  </tr>
				</table>
			</div>
			

		</div>
		</div>
		<div class="col-md-8 col-sm-8">
			<section class="comments">
	<article class="comment">
		<a class="comment-img" href="#non">
			<img src="http://lorempixum.com/50/50/people/1" alt="" width="50" height="50" />
		</a>
			
		<div class="comment-body">
			<div class="text">
			  <p>You booked <a href="#">Pokhara Futsal Arena</a></p>
			</div>
			<p class="attribution">At 2:20pm, 4th Dec 2012</p>
		</div>
	</article>
	
	<article class="comment">
		<a class="comment-img" href="#non">
		<img src="http://lorempixum.com/50/50/people/7" alt="" width="50" height="50">
		</a>
			
		<div class="comment-body">
			<div class="text">
			  <p>This is a much longer one that will go on for a few lines.</p>
			  <p>It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.</p>
			</div>
		<p class="attribution">At 2:23pm, 4th Dec 2012</p>
		</div>
	</article>
		
	<article class="comment">
		<a class="comment-img" href="#non">
		<img src="http://profile.ak.fbcdn.net/hprofile-ak-snc4/572942_100000672487970_422966851_q.jpg" alt="" width="50" height="50">
		</a>
			
		<div class="comment-body">
			<div class="text">
				<p>Originally from <a href="http://cssdeck.com/item/301/timeline-style-blog-comments#comment_289">cssdeck.com</a> this presentation has been updated 
				to looks more precisely to the facebook timeline</p>
			</div>
		<p class="attribution">At 2:44pm, 14th Apr 2012</p>
		</div>
	</article>
</section>​
		</div>
	</div>
	@else
		User not available

	@endif

@stop