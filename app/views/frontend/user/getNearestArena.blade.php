
  <div class="row">
                      <div class="col-md-3">
                        <div class="schedule">Schedules</div>
                      </div>
                    </div>
   <div style="border-bottom: 4px solid #F43C12;"></div>
              	    <table class="responsive-table responsive-table-input-matrix">
                        <tr>
                          <th>Duration</th>
                          <th>Status</th>
                          <th>Booked By</th>
                          <th>Price</th>
                          <th>Phone No</th>
                        </tr>
                        <input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">

      <?php
            date_default_timezone_set("Asia/Katmandu"); 
            $day=date('w') +1; 
            echo "<input type='hidden' id='today' value='".$day."' >";
            $date=date("Y-m-d"); 
            echo " <input type='hidden' id='date' value='".$date."' >";
        ?>
                                <?php
                               
                         
                    $adminid = $result[0]->admin_id;
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
                      <tr >
                    <td data-th="Role">
                      <?php echo $key->start_time; ?>--<?php echo $key->end_time; ?>
                    </td>
                      @if($flag==1) 
                      <td data-th="Add to Page">
                        <input  type="button"  class="btn btn-primary"  value="Booked" >
                      </td>
                      @else
                      <td data-th="Add to Page">
                        <input  type="button"  class="btn btn-danger"  value="Not Booked" >
                      </td>
                      @endif

                      
                      @if($flag==1) 
                        <?php $user= User::where('id',$getuser)->get();   
                      ?>
                      <td data-th="Configure">
                          <input  type="button"  class="btn btn-primary"  value="<?php  echo $user[0]->name; ?>" >
                      </td>
                      @else
                      <td data-th="Configure">
                        <input  type="button"  class="btn btn-danger"  value="Not Booked" >
                      </td>
                      @endif
                    <td data-th="View">
                    @if($flag==1) 
                    Rs.<?php echo $price; ?>
                      @else
                      Rs.<?php echo $key->price; ?>
                    @endif  
                    </td>
                    @if($flag==1) 
                        <?php $user= User::where('id',$getuser)->get();   
                      ?>
                          @if(!empty($user[0]->contactno))
                        <td data-th="Change Permissions">
                              <input  type="button"  class="btn btn-primary"  value="<?php  echo $user[0]->contactno; ?>" >
                          </td>
                          @else
                          <td>
                            <input  type="button"  class="btn btn-danger"  value="None" >
                          </td>
                          @endif
                      @else
                     <td data-th="Change Permissions">
                        <input  type="button"  class="btn btn-danger"  value="Not Booked" >
                      </td>
                      @endif
              </tr>
                  @endforeach 
     </table>