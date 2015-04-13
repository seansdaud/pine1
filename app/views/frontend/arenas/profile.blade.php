@extends("frontend.layout.main")

@section("content")
	<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:20px;">
		<div class="row" >
			<div class="col-md-6 col-sm-6">
				<?php if(!empty($arena->banner)): ?>
					<?php $asset = "assets/img/arena/".$arena->banner; ?>
				<?php else: ?>
					<?php $asset = 'assets/img/stadium.jpg'; ?>
				<?php endif; ?>
				<img class="arena-banner" src="{{ asset($asset) }}">
			</div>
			<div class="col-md-6 col-sm-6">
				<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
				<span style="  display: block !important; position: absolute !important; width: 0 !important;  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; bottom: -77px;"></span>
				<div class="arena-wrapper">
					<div class="arena-top">{{ $arena->name }}</div>
					<div style="color:white; font-family:'Titillium Web', sans-serif;"><span style="color:#F43C12;">>>  </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<span style="color:#F43C12;">  //</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-4" style="  box-shadow: 4px 19px 16px #888888;">
			<div class="row">
				<div class="col-md-7">
					<div class="cat-name">
		                <span class="base schedule">Arena info</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
		
			<div class="profile-wrap">
				<div style="  margin-top: 25px;">
					<table class="table">
					  <tr>
					  	<td>Name :</td>
					  	<td>{{ ucfirst($arena->name) }}</td>
					  </tr>
					  <tr>
					  	<td>Email :</td>
					  	<td>{{ $arena->owner->email }}</td>
					  </tr>
					  <tr>
					  	<td>Address :</td>
					  	<td>{{ ucfirst($arena->address) }}</td>
					  </tr>
					  <tr>
					  	<td>Contact No :</td>
					  	<td>
					  		<?php $chars = substr($arena->phone, 0, 2); ?>
							<?php $chars3 = substr($arena->phone, 0, 3); ?>
							<?php if($chars=="98"): ?>
								<?php echo "+977-".$arena->phone; ?>
							<?php elseif($chars=="01" && $chars3!="010"): ?>
								<?php echo "+977-".$chars." - ".substr($arena->phone, 2, strlen($arena->phone)); ?>
							<?php else: ?>
								<?php echo "+977-".$chars3."-".substr($arena->phone, 3, strlen($arena->phone)); ?>
							<?php endif; ?>
					  	</td>
					  </tr>
					  <tr>
					  	<td>Owner :</td>
					  	<td>{{ $arena->owner->name }}</td>
					  </tr>
					  <tr>
					  	<td>Opening Time :</td>
					  	<td>6 Am</td>
					  </tr>
					  <tr>
					  	<td>Closing Time :</td>
					  	<td>8 Pm</td>
					  </tr>

					</table>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-7">
					<div class="cat-name" style="margin-bottom:15px;">
		                <span class="base schedule">Events</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<div>
				<div class="CoverImage FlexEmbed FlexEmbed--2by1 background" style="background-image:url(assets/img/profile-02.jpg);">
	    		     <div class="text-over">Pokhara futsal tournament</div>
	    		     <div class="sept">Gairapatan,Pokhara</div>
	    		     <div class="gaira">9 Sep - 12 Sep</div>
	    		     <div class="layer"></div>
                </div>
			</div>
			<div>
				<div class="CoverImage FlexEmbed FlexEmbed--2by1 background" style="background-image:url(assets/img/profile-02.jpg);">
	    		     <div class="text-over">Pokhara futsal tournament</div>
	    		     <div class="sept">Gairapatan,Pokhara</div>
	    		     <div class="gaira">9 Sep - 12 Sep</div>
	    		     <div class="layer"></div>
                </div>
			</div>
		</div>
		<div class="col-md-8 col-sm-8">
			<div class="row">
				<div class="col-md-3">
					<div class="cat-name">
		                <span class="base schedule">Description</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<div style="margin: 11px auto; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. </div>
			<div class="row">
				<div class="col-md-3">
					<div class="cat-name">
		                <span class="base schedule">Booking</span>
		                <span class="arrow"></span>
	                </div>
				</div>
				<div class="col-md-5 col-sm-2 col-md-offset-2 col-sm-offset-2">
	                <div class="futsal-nam">27 Feb 2015</div>
	            </div>
	            <div class="col-md-2 col-sm-2">
	                <div style="float:right;">
	                  <nav>
	                      <ul class="pagination" style="margin:0 !important;">
	                        <li>
	                          <a href="#" aria-label="Previous">
	                            <span aria-hidden="true">«</span>
	                          </a>
	                        </li>
	                        
	                        <li>
	                          <a href="#" aria-label="Next">
	                            <span aria-hidden="true">»</span>
	                          </a>
	                        </li>
	                      </ul>
	                    </nav>
	                </div>
	            </div>
			</div>
			<div>
				<table class="responsive-table responsive-table-input-matrix">
	                <tbody>
	                    <tr>
	                      <th>Duration</th>
	                      <th>Status</th>
	                      <th>Booked By</th>
	                      <th>Price</th>
	                    </tr>
	                        <input type="hidden" id="base_url">
	      							<input type="hidden" id="today" value="1"> <input type="hidden" id="date" value="2015-04-05">   
	      				<tr>                                                                                   
		                    <td data-th="Role">9:00pm--10:00pm </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="View">Rs.1000</td>
	                    </tr>
		                <tr>                                                                              
		                    <td data-th="Role">9:00pm--10:00pm </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="View">Rs.1000</td>
		                </tr>
	                	<tr>                                                                              
		                    <td data-th="Role">9:00pm--10:00pm </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="View">Rs.1000</td>
		                </tr>
	                	<tr>                                                                              
		                    <td data-th="Role">9:00pm--10:00pm </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="Add to Page">
		                        <button type="button" class="btn btn-success">Available</button>
		                    </td>
		                    <td data-th="View">Rs.1000</td>
		                </tr>
	            	</tbody>
	          	</table>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="cat-name">
		                <span class="base schedule">Review</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			@foreach($arena->reviews as $review)

				<?php $review_from = User::where("id", "=", $review->user_id)->first(); ?>
				<b>{{ ucfirst($review_from->name) }}</b>
				<p>
					{{ ucfirst($review->review) }}
					<small>
						<?php echo $date = date("d M Y", strtotime($review->created_at)); ?>
						<?php if((int)date("H", strtotime($review->created_at)) > 12): ?>
							<?php echo date("h:m", strtotime($review->created_at))." pm"; ?>
						<?php else: ?>
							<?php echo date("h:m", strtotime($review->created_at))." am"; ?>
						<?php endif; ?>
					</small>
				</p>

			@endforeach

			@if(Auth::check())
				{{ Form::open(array('route' => 'add-review', 'class' => 'form-horizontal style-form', 'data-toggle' => 'validator', 'id'=>'review-form', 'style'=>'display:none;')) }}
					<div id="characters"></div>
					<div class="form-group">
						<textarea name="review" class="form-control" placeholder="Write short review for this arena" required maxlength="200"></textarea>
					</div>
					<input type="hidden" name="arena_id" value="{{ $arena->id }}">
					<div class="form-group">
						<input type="submit" value="Submit" class="btn btn-info">
					</div>

				{{ Form::close() }}
			@endif
			
		</div>
	</div>

@stop