
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
                         $arena_name=User::where('id',  $result[0]->admin_id )->get();
                          echo $arena_name[0]->arena->name; ?>
                         </div>
                      </div>
                      <div class="col-md-2 col-sm-2">
                      </div>
                      <div class="col-md-2 col-sm-2">
                        <div style="float:right;">
                          <nav>
                              <ul class="pagination" style="margin:0 !important;">
                                <li>
                                <div style="background-color:#F15620 !important;" class="btn btn-warning schedul" data-type="prev">
                                   
                                    <span aria-hidden="true" >&laquo;</span>
                                 </div>
                              
                                </li>
                                
                                <li>
                                  
                                 <div class="btn btn-warning schedul"   data-type="next" style="background-color:#F15620 !important;">

                                    <span aria-hidden="true" >&raquo;</span>
                                  </div>
                                </li>
                              </ul>
                            </nav>
                        </div>
                      </div>
                    </div>
    <div>
      <div class="row">
        <div class="col-md-6">
          <div class="length"><span class="glyphicon glyphicon-adjust" style="  left: -10px;
  color:rgb(229, 226, 226); font-size:12px;"></span>
          <span><?php echo round($result[0]->distances,2); ?> miles</span></div>
        </div>
        <div class="col-md-6">
          
        </div>
      </div>
        
            
    <input type="hidden" id='dist' value="<?php echo round($result[0]->distances,2); ?>">
    </div>
              	    <table class="responsive-table responsive-table-input-matrix">
                        <tr>
                          <th>Duration</th>
                          <th>Status</th>
                          <th>Booked By</th>
                          <th>Price</th>
                        <!--   <th>Phone No</th> -->
                        </tr>
                        <input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">

    
    <input type="hidden" id='owner_id' value="<?php echo $result[0]->admin_id;?>">

                                <?php
                               
                         
                    $adminid = $result[0]->admin_id;
                    $arena=Arena::where('user_id',$adminid)->first();
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

                  @endforeach 
     </table>