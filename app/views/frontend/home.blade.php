<!DOCTYPE html>
<html>
  @include('frontend.layout.header')
  <body>
    <div class="container-fluid" style="padding-left:0; padding-right:0;">
      @include('frontend.layout.nav')
        
        
        <div class="container container-costum">
  	        <!-- <div style="margin-left: -15px !important; margin-right: -15px !important;">
              <img src="{{ asset('assets/img/futsal.jpg') }}" style="width: 100%; border-bottom: 7px solid rgb(244, 60, 18); box-shadow: 0px 53px 217px #000000;">
            </div> -->
            <div style="  margin-left: -15px; margin-right: -15px; border-bottom: 7px solid rgb(244, 60, 18); box-shadow: 0px 53px 217px #000000;" >
            <div class="CoverImagee FlexEmbed FlexEmbed--2by11 background"
                 style="background-image:url(assets/css/futsal.jpg)">
                 
            </div>
            </div>
            
            @include('frontend.layout.search_filter')
          	<div class="row">
              	<div class="col-md-8 col-sm-8 shade">
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
                                          <?php      $user= User::where('usertype',2)->limit(1)->get();
                                      $adminid =$user[0]->id; ?>
                                   <span class="arrow" style=" display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-top: 40px solid #F15620 !important; border-right: 40px solid transparent !important; right: -25px; top: 0"></span>
                        </div>
                  		</div>
                      <div class="col-md-4 col-md-offset-1 col-sm-4 col-xs-6">
                        <div class="futsal-name"><?php echo  $user[0]->name;?></div>
                                             </div>
                      <div class="col-md-2 col-sm-4 col-xs-6">
                         <div class="futsal-name"><?php echo  $date;?></div> 
                        <div>
                          <span>May</span>
                          <span>26</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-3">
                        <div style="float:right;">
                          <nav>
                              <ul class="pagination" style="margin:0 !important;">
                                <li>
<div class="btn btn-warning schedul" data-type="prev" style="background-color:#F15620 !important;">
                                   
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
              	    <table class="responsive-table responsive-table-input-matrix">
                        <tr>
                          <th>Duration</th>
                          <th>Status</th>
                          <th>Booked By</th>
                          <th>Price</th><!-- 
                          <th>Phone No</th>
 -->                        </tr>
                        <input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">

    <input type="hidden" id='owner_id' value="<?php echo  $adminid ;?>">
                                <?php
                                $user= User::where('usertype',2);
                    if($user->count()):
                      $user=$user->first();
                    $adminid =$user->id;

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
                  <?php endif; ?>
                    </table>

              	</div>
              	</div>
              	<div class="col-md-4 col-sm-4">
            		    
                    @include('frontend.events.event_sidebar')
                    
              	</div>
            </div>

        </div>
    </div>
    @include('frontend.layout.footer')

  </body>
    <script type="text/javascript">
       $(".select-arena").select2({
          placeholder: "Select a arena",
  allowClear: true
       });
     </script>
    <script type="text/javascript">



// var x = document.getElementById("demo");

    function showPosition(position) {
      var base_url= $('#base_url').val();
        //  x.innerHTML = "Latitude: " + position.coords.latitude + 
        // "<br>Longitude: " + position.coords.longitude;  

        $.ajax({
            type: "GET",
            url: base_url+'/getCurrent',
            data: {
              lat:position.coords.latitude,
              lng:position.coords.longitude,
              radius:200

            },
            success:function(data){ 
                if (data=="noResult") {

                }else{
                    $('.ajax-caller').html(data);
             // x.innerHTML = "data: "+ data;
              // console.log(position.coords.latitude);
              // console.log(position.coords.longitude);
                 console.log(data);
                };
           
            },
            beforeSend : function (){
                 // $('#id').html("<div class='loading'><img src='"+base_url+"/assets/img/ajax_load.gif'></div>");

            },
            error: function(jqXHR, textStatus, errorThrown){ 
              alert( jqXHR.responseText);
               console.log(jqXHR.responseText);
            }
        });
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }

    $('.select-arena').on('change', function (e) {
        var base_url= $('#base_url').val();
        var optionSelected = $("option:selected", this);
      
        var valueSelected = this.value;
        
        $.ajax({
            url:base_url+"/getArena",
            type:'GET',
            data: {
                id:valueSelected
            },
            success:function(result){ 
          //  alert(result);

                    $('.ajax-caller').html(result);
            // $(".ajax").html(result);
              $('#id').html("");
                            if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(showPosition1);
    }
    else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
    }
            },
            beforeSend : function (){
            $('#id').html("<div class='loading1' ><img src='"+base_url+"/assets/img/ajax_load.gif'></div>");

            },
            error: function(jqXHR, textStatus, errorThrown){ 
                alert(jqXHR.responseText);
            }
        });
    });

  </script>
  </body>
</html>