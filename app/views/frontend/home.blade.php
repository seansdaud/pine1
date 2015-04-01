<!DOCTYPE html>
<html>
  <head>
    <title>{{ $title }}</title>
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/style1.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Ropa+Sans') }}
  </head>
  <body>
    <div class="container-fluid" style="padding-left:0; padding-right:0;">
      @include('frontend.layout.nav')
        
        
        <div class="container">
  	       <div><img src="{{ asset('assets/img/futsal.jpg') }}" style="width: 100%; margin-top: -95px; margin-bottom:25px;"></div>
          	<div class="row">
              	<div class="col-md-8">
                  <div class="ajax-caller">
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
              		  <div class="events">Events</div>
              		  <div style="border-bottom: 4px solid rgb(81, 81, 82); margin-bottom:16px;"></div>
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