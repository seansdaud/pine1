@extends('backend.layout.main')

@section("content")
<div class="ajax">
	<?php
			date_default_timezone_set("Asia/Katmandu"); 
			$day=date('w') +1; 
			echo "<input type='hidden' id='today' value='".$day."' >";
			$date=date("Y-m-d"); 
			echo "<div class='today'>Today's Date : <span class='dateto'>".$date."</div></span></br>";
			echo " <input type='hidden' id='date' value='".$date."' >";
	?>
	<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
	<input type="hidden" id='for' value="show">
	<div class="arrows-prev">
		<img src="{{ asset('assets/img/prev.png') }}">
	</div>
	<div class="arrows-next">
		<img src="{{ asset('assets/img/next.png') }}">
	</div>
<div class="id"></div>
	<div class="panel-body tabbody">
							<table name='table'  class='table detailtable  table-striped table-hover' border="3" width="100%">

												<tr class="warning">
														<td name='time'><span class="day">Time</span></td>
														<td name='status'><span class="day">Status</span></td>
														<td name='booked_by'><span class="day">Booked By</span></td>
														<td name='price'><span class="day">Price</span></td>
														<td name='phone_no'><span class="day">Phone no:</span></td>
														
												</tr>
												
													<?php
							$adminid = Auth::id();
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
								<tr class="danger">
										<td name='time'>
											<?php echo $key->start_time; ?>--<?php echo $key->end_time; ?>
										</td>
											@if($flag==1) 
											<td>
												<input  type="button"  class="btn btn-danger"  value="Booked" >
											</td>
											@else
											<td>
												<input  type="button"  class="btn btn-primary"  value="Available" >
											</td>
											@endif

											
											@if($flag==1) 
												<?php	$user= User::where('id',$getuser)->get();		
											?>
											<td>
													<input  type="button"  class="btn btn-danger"  value="<?php 	echo $user[0]->name; ?>" >
											</td>
											@else
											<td>
												<input  type="button"  class="btn btn-success"  value="Not booked" >
											</td>
											@endif
										<td>
										@if($flag==1) 
										Rs.<?php echo $price; ?>
											@else
											Rs.<?php echo $key->price; ?>
										@endif	
										</td>
										@if($flag==1) 
												<?php	$user= User::where('id',$getuser)->get();		
											?>
													@if(!empty($user[0]->contact))
													<td>
															<input  type="button"  class="btn btn-danger"  value="<?php 	echo $user[0]->contact; ?>" >
													</td>
													@else
													<td>
														<input  type="button"  class="btn btn-danger"  value="No Number" >
													</td>
													@endif
											@else
											<td>
												<input  type="button"  class="btn btn-success"  value="Not Booked" >
											</td>
											@endif
							</tr>

							@endforeach 
						</table>
	</div>
</div>
@stop