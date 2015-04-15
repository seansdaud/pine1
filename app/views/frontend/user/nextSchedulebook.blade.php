                    <div class="row">
                      <div class="col-md-3 col-sm-4 col-xs-8">
                        
                        <div class="cat-name">
                        <span class="base"><a href="#" class="schedule">Schedules</a></span>
                        <div id="id"></div>

                        <span class="arrow" style=" display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-top: 40px solid #F15620 !important; border-right: 40px solid transparent !important; right: -25px; top: 0"></span>
                        </div>
                      </div>
                      <div class="col-md-4 col-md-offset-1 col-sm-4">
                                               <div class="futsal-name">
                         <?php
                         $arena_name=User::where('id',  $owner)->get();
                          echo $arena_name[0]->arena->name; ?>
                         </div>
                      </div>
                      <div class="col-md-2 col-sm-2">
                        <div class="futsal-name"><?php echo $date; ?></div>
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
              	    <table class="responsive-table responsive-table-input-matrix">
                        <tr>
                          <th>Duration</th>
                          <th>Status</th>
                          <th>Booked By</th>
                          <th>Price</th>
                        <!--   <th>Phone No</th>
 -->                        </tr>
                        <input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">

      <?php
          
            echo "<input type='hidden' id='today' value='".$day."' >";
            echo " <input type='hidden' id='date' value='".$date."' >";
        ?>

    <input type="hidden" id='owner_id' value="<?php echo $owner;?>">

                                <?php
                               
                         
                    $adminid = $owner;
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
                        <input  type="button"  class="btn btn-danger"  value="Booked" >
                      </td>
                      @else
                      <td data-th="Add to Page">
                        <input  type="button"  class="btn btn-primary"  value="Available" >
                      </td>
                      @endif

                      
                      @if($flag==1) 
                        <?php $user= User::where('id',$getuser)->get();   
                      ?>
                      <td data-th="Configure">
                          <input  type="button"  class="btn btn-danger"  value="<?php  echo $user[0]->name; ?>" >
                      </td>
                      @else
                      <td data-th="Configure">
                        <input  type="button"  class="btn btn-success"  value="Book" >
                      </td>
                      @endif
                    <td data-th="View">
                    @if($flag==1) 
                    Rs.<?php echo $price; ?>
                      @else
                      Rs.<?php echo $key->price; ?>
                    @endif  
                    </td>
                  
              </tr>
                  @endforeach 
     </table>