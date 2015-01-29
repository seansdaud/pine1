@extends('backend.layout.main')

@section("content")
<?php
		date_default_timezone_set("Asia/Katmandu"); 
		$day=date('w') +1; 
		echo "<input type='hidden' id='today' value='".$day."' >";
		$date=date("Y-m-d"); 
		echo "<div class='today'>Today's Date : <span class='dateto'>".$date."</div></span></br>";
		echo " <input type='hidden' id='date' value='".$date."' >";
?>

<div class="panel-body tabbody">
						<table name='table'  class='table detailtable  table-striped table-hover' border="3" width="100%">

											<tr class="warning">
													<td name='time'><span class="day">Time</span></td>
													<td name='status'><span class="day">Status</span></td>
													<td name='booked_by'><span class="day">Booked By</span></td>
													<td name='price'><span class="day">Price</span></td>
													<td name='phone_no'><span class="day">Phone no:</span></td>
													
											</tr>
											
					</table>
</div>

@stop