<div class="top-search">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-7 col-md-5">
				<span class="khoj">Login</span>
				<span class="khoj">Register</span>
				<span id="wrap">
				  <form action="" autocomplete="on">
				  <input id="search" name="search" type="text" placeholder="What're we looking for ?">
				  <span class="glyphicon glyphicon-search gly-search"></span><input id="search_submit" value="Rechercher" type="submit">
				  </form>
				</span>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default nav-costum" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">HOME</a></li>
      <li><a href="#">ARENAS</a></li>
      <li><a href="#">BOOKING</a></li>
      <li><a href="#">ABOUT</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div><img src="{{ asset('assets/img/futsal.jpg') }}" style="  width: 100%; margin-top: -95px; margin-bottom:25px;"></div>
<div class="container">
	<div class="row">
	<div class="col-md-8">
	<div class="row">
		<div class="col-md-3">
			<div class="schedule">Scheduler</div>
		</div>
		<!-- <div class="col-md-9" style="text-align:right;">
			<span><span class="colour1"></span>Available</span>
			<span><span class="colour2"></span>Booked</span>
			<span><span class="colour3"></span>Event</span>
		</div> -->
		
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

<p>&larr; Drag window (in editor or full page view) to see the effect. &rarr;</p>
	
		<!-- <table class="table table-bordered">
		  <tr class="days">
		  	<td>DAYS >></td>
		  	<td>Sun</td>
		  	<td>Mon</td>
		  	<td>Tue</td>
		  	<td>Wed</td>
		  	<td>Thur</td>
		  	<td>Fri</td>
		  	<td>Sat</td>

		  </tr>
		  <tr>
		  	<td class="time-side">6 AM</td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">7 AM</td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">8 AM</td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">9 AM</td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">10 AM</td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">11 AM</td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">12 PM</td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">1 PM</td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  </tr>
		  <tr>
		  	<td class="time-side">2 PM</td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="booked"><span class="glyphicon glyphicon glyphicon-remove"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="avai"><span class="glyphicon glyphicon glyphicon-ok"></span></td>
		  	<td class="events"><span class="glyhicon glyphicon glyphicon-calendar"></span></td>
		  </tr>
		</table> -->
		
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




<div>
<a href="{{URL::route('home')}}">Home</a>
@if(Auth::check())
	<a href="{{ URL::route('logout') }}">Logout</a>
@else
	<a href="{{ URL::route('login') }}">Login</a>
	<a href="{{ URL::route('register') }}">Register</a>
@endif
</div>
@if(Session::has('danger'))
    {{ Session::get('danger') }}
@endif

@if(Session::has('success'))
    {{ Session::get('success') }}
@endif

@if(Session::has('warning'))
    {{ Session::get('warning') }}
@endif