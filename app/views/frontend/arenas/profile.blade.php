@extends("frontend.layout.main")

@section("content")
	<div class="row">
		<div class="col-md-4 col-sm-4" style="  box-shadow: 4px 19px 16px #888888;">
			<div class="row">
				<div class="col-md-7 col-sm-7 col-xs-9">
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
					  	<td>Location :</td>
					  	<td>{{ ucfirst($arena->address) }}</td>
					  </tr>
					  <tr>
					  	<td>City :</td>
					  	<td>{{ ucfirst($arena->city) }}</td>
					  </tr>
					  <tr>
					  	<td>District :</td>
					  	<td>{{ ucfirst($arena->district) }}</td>
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
			
			@include('frontend.events.event_sidebar', array('owner_id'=>$arena->user_id))
		</div>
		<div class="col-md-8 col-sm-8">
		
			<div class="ajax-caller">
			<div class="row">
				  <div class="col-md-3 col-sm-4 col-xs-8">
                        
                        <div class="cat-name">
                        <span class="base"><a href="#" class="schedule">Schedules</a></span>
                    <div id="id"></div>

      <?php
            date_default_timezone_set("Asia/Katmandu"); 
            $day=date('w') +1; 
            echo "<input type='hidden' id='today' value='".$day."' >";
            $date=date("Y-m-d"); 
            echo " <input type='hidden' id='date' value='".$date."' >";
        ?>
                        <span class="arrow" style=" display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-top: 40px solid #F15620 !important; border-right: 40px solid transparent !important; right: -25px; top: 0"></span>
                        </div>
                      </div>
                      <div class="col-md-4 col-md-offset-1 col-sm-4">
                                               <div class="futsal-name">
                         <?php
                          echo $arena->name; ?>
                         </div>
                      </div>
                      <div class="col-md-2 col-sm-2">
                        <div class="futsal-name">
                        	<?php echo $date; ?>
                        </div>
                      </div>
	            <div class="col-md-2 col-sm-2">
	                <div style="float:right;">
	                  <nav>
	                      <ul class="pagination" style="margin:0 !important;">
	                        <li>
                               <div class="btn btn-warning schedul" data-type="prev">
                                   
                                    <span aria-hidden="true" >&laquo;</span>
                                 </div>
                              
                                </li>
                                
                                <li>
                                  
                                 <div class="btn btn-warning schedul"   data-type="next">

                                    <span aria-hidden="true" >&raquo;</span>
                                  </div>
                                </li>
	                      </ul>
	                    </nav>
	                </div>
	            </div>
			</div>
			  <div>
       <div class="distance-ajax"></div>
    </div>
				<table class="responsive-table responsive-table-input-matrix">
	                <tbody>
	                    <tr>
	                      <th>Duration</th>
	                      <th>Status</th>
	                      <th>Booked By</th>
	                      <th>Price</th>
	                    </tr>

	      							
	      			  <input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">

   				 <input type="hidden" id='owner_id' value="<?php echo $arena->user_id;?>">
                                <?php
                     $adminid =$arena->user_id; 

                    $arena=Arena::where('user_id',$adminid)->first();
                     ?>
                     <?php  
                    $schedular=Schedule::where('admin_id', $adminid )->where('day', $day )->orderBy('booking', 'asc')->get();
                    ?>
                    @foreach ($schedular as $key)
                      <?php  
                      $bookin=Booking::where('status', $key->book_status)->where('booking_date', $date )->get();

                    $bookintime=Booking::where('arena_id', $adminid)->where('booking_date', $date )->get();

                        $flag=0;
                        foreach ($bookintime as $key1 ) {
                            if ($key1->scheduleinfo->start_time==$key->start_time && $key1->scheduleinfo->end_time==$key->end_time) {

                              $flag=1;  
                              $getuser=$key1->user_id;
                              $price=$key1->scheduleinfo->price;
                            }
                          
                        }
                          
                      ?>
                       

                      	@include("frontend.arenas.scheduletemp")
                  @endforeach 	            	</tbody>
	          	</table>
	          	</div>
	          		<div class="row">
							<div class="col-md-3">
								<div class="cat-name">
					                <span class="base schedule">Description</span>
					                <span class="arrow"></span>
				                </div>
							</div>
			</div>
			<div style="margin: 11px auto; text-align: justify;">
				<?php echo $arena->about; ?>
			</div>
			


			<div class="row">
				<div class="col-md-3">
					<div class="cat-name">
		                <span class="base schedule">Review</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
				<?php $row_closed = null; $i=0; ?>
				@foreach($arena->reviews as $review)
					<?php $review_from = User::where("id", "=", $review->user_id)->first(); ?>
					<?php $i++; if($i==1): $row_closed=false; ?>
						<div class="row">
					<?php endif; ?>

							<div class="col-md-6">
								<div>
									<?php if(!empty($review_from->image)): ?>
										<?php $image = "assets/img/profile/user/thumb/".$review_from->image; ?>
									<?php else: ?>
										<?php $image = "assets/img/default.jpg" ?>
									<?php endif; ?>
									<span class="review-img"><img src="{{ asset($image) }}" alt="{{ ucfirst($review_from->name) }}"></span>
									<span class="gurg">{{ ucfirst($review_from->name) }}</span><br>
									<small>
										<?php echo $date = date("d M Y", strtotime($review->created_at)); ?>
										<?php if((int)date("H", strtotime($review->created_at)) > 12): ?>
											<?php echo date("h:m", strtotime($review->created_at))." pm"; ?>
										<?php else: ?>
											<?php echo date("h:m", strtotime($review->created_at))." am"; ?>
										<?php endif; ?>
									</small>
								</div>
								<div>{{ ucfirst($review->review) }}</div>
							</div>

					<?php if($i==2): $i=0; $row_closed=true; ?>
						</div>
					<?php endif; ?>

				@endforeach

			@if(Auth::check())
				@if(Auth::user()->usertype=="1")
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
				@else
					Login as a user to add review.
				@endif
			@else
				Login to add review.
			@endif
			</div>
		</div>
	</div>

@stop