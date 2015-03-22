
<?php
		
			echo "<input type='hidden' id='today' value='".$day."' >";
			echo "<div class='today'>Today's Date : <span class='dateto'>".$date."</div></span></br>";
			echo " <input type='hidden' id='date' value='".$date."' >";
	?>
		<input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
		<input type="hidden" id='for' value="book">
	<div class="arrows-prev">
		<img src="{{ asset('assets/img/prev.png') }}">
	</div>
	<div class="arrows-next">
		<img src="{{ asset('assets/img/next.png') }}">
	</div>
	<div class="id"></div>
	
<div class="bookname"<div class="bookname" style=" font-size: 266%; color: maroon; margin-top: -3%; margin-left: 34%;">
Booking for<?php echo Session::get('usersname'); ?></div>

	<div class="panel-body tabbody">
							<table name='table'  class='table detailtable  table-striped table-hover' border="3" width="100%">

												<tr class="warning">
														<td name='time'><span class="day">Time</span></td>
														<td name='status'><span class="day">Status</span></td>
														<td name='booked_by'><span class="day">Booked By</span></td>
														<td name='price'><span class="day">Price</span></td>
														<td name='phone_no'><span class="day">Phone no:</span></td>
														
												</tr>
												
												{{
							$adminid = Auth::id();
							$schedular=Schedule::where('admin_id', $adminid )->where('day', $day )->get();
														}}
							@foreach ($schedular as $key)
								<?php  
								$bookin=Booking::where('status', $key->book_status)->where('booking_date', $date )->get();
							$bookintime=Booking::where('arena_id', $adminid)->where('booking_date', $date )->get();
									$flag=0;
									foreach ($bookintime as $key1 ) {
										$sc=Schedule::where('id',$key1->schedule_id)->get();
										if (!empty($sc)) {
											if ($sc[0]->start_time==$key->start_time && $sc[0]->end_time==$key ->end_time) {

												$flag=1;	
												$getuser=$key1->user_id;
											}
										}
									}
								?>
							<tr class="danger">
										<td name='time'>
											<?php echo $key->start_time; ?>--<?php echo $key->end_time; ?>
										</td>
											@if($flag==1) 
											<td>
												<input  type="button"  class="btn btn-primary"  value="Booked" >
											</td>
											@else
											<td>
												<input  type="button"  class="btn btn-danger"  value="Not Booked" >
											</td>
											@endif

											
											@if($flag==1) 
												<?php	$user= User::where('id',$getuser)->get();		
											?>
											<td>
													<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->name; ?>" >
											</td>
											@else
											<td>
											{{ Form::open(array('route' => 'postbookschedule','class'=>'form-horizontal row-fluid','id' => 'myform' ,'files'=>true, 'method'=>'post')) }}
										<?php
										$usersname = Session::get('usersname');
										 $usersid= User::where('username',$usersname)->get(); ?>
																<input type="hidden" name="key_id" value="<?php echo $key->id; ?>">
																<input type="hidden" name="user_id" value="<?php echo $usersid[0]->id; ?>">
																<input type='hidden' name='date' value='<?php echo $date; ?>'>
																<input  type="submit"  class="btn btn-success"  value="Book" >
										{{ Form::close() }}
											</td>
											@endif
										<td>
											Rs.<?php echo $key->price; ?>
										</td>
										@if($flag==1) 
												<?php	$user= User::where('id',$getuser)->get();		
											?>
													@if(!empty($user[0]->contactno))
													<td>
															<input  type="button"  class="btn btn-primary"  value="<?php 	echo $user[0]->contactno; ?>" >
													</td>
													@else
													<td>
														<input  type="button"  class="btn btn-danger"  value="None" >
													</td>
													@endif
											@else
											<td>
												<input  type="button"  class="btn btn-danger"  value="Not Booked" >
											</td>
											@endif
							</tr>

							@endforeach 
						</table>
	</div>