<!DOCTYPE html>
<html>
  <head>
    <title>{{ ucfirst($title) }}</title>
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/style1.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Ropa+Sans') }}
  </head>
  <body>
    <div class="container-fluid" style="padding-left:0; padding-right:0;">
      @include('frontend.layout.nav')
        
        
        <div class="container container-costum">
  	        <div style="margin-left: -15px !important; margin-right: -15px !important;">
              <img src="{{ asset('assets/img/futsal.jpg') }}" style="width: 100%; border-bottom: 7px solid rgb(244, 60, 18); box-shadow: 0px 53px 217px #000000;">
            </div>
            <div class="search-all">
            <div class="row">
              <div class="col-md-8 col-sm-8 others">Search Other Arenas >></div>
              <div class="col-md-4 col-sm-4">
                <div class="form-group">
                <label class="control-label sr-only" for="inputGroupSuccess4">Input group with success</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                  <input type="text" class="form-control" id="inputGroupSuccess4" aria-describedby="inputGroupSuccess4Status">
                </div>              
                </div>
            </div>
            </div>
            </div>
          	<div class="row">
              	<div class="col-md-8" style="  box-shadow: 4px 19px 16px #888888;">
                  <div class="ajax-caller">
                  	<div class="row">
                  		<div class="col-md-3 col-sm-4 col-xs-8">
                  			
                        <div class="cat-name">
                        <span class="base"><a href="#" class="schedule">Schedules</a></span>
                        <span class="arrow"></span>
                        </div>
                  		</div>
                      <div class="col-md-4 col-md-offset-1 col-sm-4">
                        <div class="futsal-name">Pokhara futsal Arena</div>
                      </div>
                      <div class="col-md-2 col-sm-2">
                        <div class="futsal-name">27 Feb 2015</div>
                      </div>
                      <div class="col-md-2 col-sm-2">
                        <div style="float:right;">
                          <nav>
                              <ul class="pagination" style="margin:0 !important;">
                                <li>
                                  <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
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
                                $user= User::where('usertype',2)->limit(1)->get();
                    $adminid =$user[0]->id;
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
              	</div>
              	</div>
              	<div class="col-md-4">
            		    <div class="row">
                      <div class="col-md-5 col-sm-7 col-xs-5">
                        
                        <div class="cat-name" style="margin-bottom:17px;">
                        <span class="base"><a href="#" class="schedule">Events</a></span>
                        <span class="arrow" style=" display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-top: 40px solid #F15620 !important; border-right: 40px solid transparent !important; right: -25px; top: 0"></span>
                        </div>
                      </div>
                    </div>
                		<div class="CoverImage FlexEmbed FlexEmbed--2by1 background"
                		     style="background-image:url(assets/css/football.jpg)">
                		     <div class="text-over">Pokhara futsal tournament</div>
                		     <div class="sept">Gairapatan,Pokhara</div>
                		     <div class="gaira">9 Sep - 12 Sep</div>
                		     <div class="layer"></div>
                		</div>

                		<div class="CoverImage FlexEmbed FlexEmbed--2by1 background"
                		     style="background-image:url(assets/css/poster.jpg)">
                		     <div class="text-over">Pokhara futsal tournament</div>
                		     <div class="sept">Gairapatan,Pokhara</div>
                		     <div class="gaira">9 Sep - 12 Sep</div>
                		     <div class="layer"></div>
                		     
                		</div>

                		<div class="CoverImage FlexEmbed FlexEmbed--2by1 background"
                		     style="background-image:url(assets/css/SFL_poster_output_0.jpg)">
                		     <div class="text-over">Pokhara futsal tournament</div>
                		     <div class="sept">Gairapatan,Pokhara</div>
                		     <div class="gaira">9 Sep - 12 Sep</div>
                		     <div class="layer"></div>
                		</div>
                    <div class="row">
                      <div class="col-md-6 col-sm-7 col-xs-5">
                        
                        <div class="cat-name" style="margin-bottom:17px;">
                        <span class="base"><a href="#" class="schedule">Follow us</a></span>
                        <span class="arrow" style=" display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-top: 40px solid #F15620 !important; border-right: 40px solid transparent !important; right: -25px; top: 0"></span>
                        </div>
                      </div>
                    </div>
                    <div class="social">
                      <img src="{{ asset('assets/img/fb.png') }}">
                      <img src="{{ asset('assets/img/instagram.jpg') }}">
                      <img src="{{ asset('assets/img/Google-Plus-icon.png') }}">
                      <img src="{{ asset('assets/img/twitter.png') }}">                      
                    </div>
              	</div>
            </div>

        </div>
    </div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/validator.min.js') }}
    {{ HTML::script('assets/js/frontend.js') }}
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
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }

  </script>
  </body>
</html>