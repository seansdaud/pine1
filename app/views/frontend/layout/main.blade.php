<!DOCTYPE html>
<html>
<head>
	<title>
		@if(!empty($title))
			<?php $heading = explode(" ", $title); ?>
			@foreach($heading as $head)
				{{ ucfirst($head) }}
			@endforeach
			| Futsal Nepal
		@else
			Futsal Nepal
		@endif
	</title>
	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/css/style1.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Ropa+Sans') }}
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<div class="container-fluid" style="padding-left:0; padding-right:0;">
		@include('frontend.layout.nav')
		<div class="container container-costum">
			@yield('content')
		</div>
	</div>
	 <!-- //footer -->
    <div class="footer">
      <div class="container">
        <div class="row footer-wrap">
          <div class="col-md-4">
            <img class="logo-below" src="{{ asset('assets/img/logo.png') }}">
          </div>
          <div class="col-md-4">
              <div>
                <div class="footer-events">
                  <span class="glyphicon glyphicon-bookmark galo"></span>
                  <span>Follow Us</span>
                </div>
              </div>
              <div class="social">
                <img src="{{ asset('assets/img/fb.png') }}">
                <img src="{{ asset('assets/img/instagram.jpg') }}">
                <img src="{{ asset('assets/img/Google-Plus-icon.png') }}">
                <img src="{{ asset('assets/img/twitter.png') }}">                      
              </div>
              <div>
                <div class="footer-events">
                  <span class="glyphicon glyphicon-bookmark galo"></span>
                  <span>Contact</span>
                </div>
              </div>
              <span class="glyphicon glyphicon-earphone terminal"></span> 
              <span>+977-9837992201</span>
              <span>+977-9837992201</span>
              <div>
              <span class="glyphicon glyphicon-globe terminal"></span>
              <span>futsalnepal.com</span>
              </div>
          </div>
          <div class="col-md-4">
            <div>
              <div class="footer-events">
                <span class="glyphicon glyphicon-bookmark galo"></span>
                <span>Events</span>
              </div>
            </div>
            <div style="min-height:85px;">
              <div class="date-wrap">
                <span style="font-size: 32px;">16</span><br/>
                <span class="months-desi">Dec</span>
              </div>
              <div style="padding: 7px 0px 0px 77px;">
                <div style="font-size: 20px; border-right: 3px solid rgb(241, 86, 32);">Pokhara futsal tournament</div>
                <div style="  color: rgb(186, 186, 178);">Gairapatan Pokhara</div>
                
              </div>
            </div>
            <div style="min-height:85px;">
              <div class="date-wrap">
                <span style="font-size: 32px;">16</span><br/>
                <span class="months-desi">Dec</span>
              </div>
              <div style="padding: 7px 0px 0px 77px;">
                <div style="font-size: 20px; border-right: 3px solid rgb(241, 86, 32);">Pokhara futsal tournament</div>
                <div style="  color: rgb(186, 186, 178);">Gairapatan Pokhara</div>
                
              </div>
            </div>
          
          </div>
        </div>
        <div class="row foot-below">
          <span>COPYRIGHT © 2010 - 2014, FUTSAL NEPAL</span> || <span>Designed by <a style="color:rgb(240, 242, 255);" href="http://pinesofts.com/">Pinesoft</a></span>
          
        </div>
      </div>
    </div>
	{{ HTML::script('assets/js/jquery.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/validator.min.js') }}
	{{ HTML::script('assets/js/frontend.js') }}

</body>
</html>