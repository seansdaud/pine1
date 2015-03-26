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
        <div><img src="{{ asset('assets/img/futsal.jpg') }}" style="width: 100%; margin-top: -95px; margin-bottom:25px;"></div>
        
        <div class="container">
  	
          	<div class="row">
              	<div class="col-md-8">
                  	<div class="row">
                  		<div class="col-md-3">
                  			<div class="schedule">Scheduler</div>
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

                        <tr>
                          <td data-th="Role">12 Pm - 1 Am</td>
                          <td data-th="Add to Page">Booked</td>
                          <td data-th="Configure">Suyog</td>
                          <td data-th="View">Rs 1200</td>
                          <td data-th="Change Permissions">9830284023</td>
                        </tr>

                        <tr>
                          <td data-th="Role">1 Pm - 2 Pm</td>
                          <td data-th="Add to Page">Booked</td>
                          <td data-th="Configure">Lalit</td>
                          <td data-th="View">Rs 1000</td>
                          <td data-th="Change Permissions">9823930113</td>
                        </tr>
                        <tr>
                          <td data-th="Role">2 Pm - 3 Pm</td>
                          <td data-th="Add to Page">Not Booked</td>
                          <td data-th="Configure">- - -</td>
                          <td data-th="View">Rs 1000</td>
                          <td data-th="Change Permissions">9846009404</td>
                        </tr>
                        
                        <tr>
                          <td data-th="Role">3 Pm - 4 Pm</td>
                          <td data-th="Add to Page">Booked</td>
                          <td data-th="Configure">Prachanda</td>
                          <td data-th="View">Rs 1200</td>
                          <td data-th="Change Permissions">9191930391</td>
                        </tr>
                        
                        <tr>
                          <td data-th="Role">4 Pm - 5 Pm</td>
                          <td data-th="Add to Page">Not Booked</td>
                          <td data-th="Configure">- - -</td>
                          <td data-th="View">Rs 1000</td>
                          <td data-th="Change Permissions">9823940012</td>
                        </tr>
                        <tr>
                          <td data-th="Role">2 Pm - 3 Pm</td>
                          <td data-th="Add to Page">Not Booked</td>
                          <td data-th="Configure">- - -</td>
                          <td data-th="View">Rs 1000</td>
                          <td data-th="Change Permissions">9846009404</td>
                        </tr>
                        
                        <tr>
                          <td data-th="Role">3 Pm - 4 Pm</td>
                          <td data-th="Add to Page">Booked</td>
                          <td data-th="Configure">Prachanda</td>
                          <td data-th="View">Rs 1200</td>
                          <td data-th="Change Permissions">9191930391</td>
                        </tr>
                
                        <tr>
                          <td data-th="Role">4 Pm - 5 Pm</td>
                          <td data-th="Add to Page">Not Booked</td>
                          <td data-th="Configure">- - -</td>
                          <td data-th="View">Rs 1000</td>
                          <td data-th="Change Permissions">9823940012</td>
                        </tr>
                        <tr>
                          <td data-th="Role">2 Pm - 3 Pm</td>
                          <td data-th="Add to Page">Not Booked</td>
                          <td data-th="Configure">- - -</td>
                          <td data-th="View">Rs 1000</td>
                          <td data-th="Change Permissions">9846009404</td>
                        </tr>
                        
                        <tr>
                          <td data-th="Role">3 Pm - 4 Pm</td>
                          <td data-th="Add to Page">Booked</td>
                          <td data-th="Configure">Prachanda</td>
                          <td data-th="View">Rs 1200</td>
                          <td data-th="Change Permissions">9191930391</td>
                        </tr>
                        
                        <tr>
                          <td data-th="Role">4 Pm - 5 Pm</td>
                          <td data-th="Add to Page">Not Booked</td>
                          <td data-th="Configure">- - -</td>
                          <td data-th="View">Rs 1000</td>
                          <td data-th="Change Permissions">9823940012</td>
                        </tr>
                    
                    </table>
              		
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

    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/validator.min.js') }}
    {{ HTML::script('assets/js/frontend.js') }}

  </body>
</html>