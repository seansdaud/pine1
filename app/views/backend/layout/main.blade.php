<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $heading = explode(" ", $title); ?>
		@foreach($heading as $head)
			{{ ucfirst($head) }}
		@endforeach
	</title>
	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/font-awesome/css/font-awesome.css') }}
	{{ HTML::style('assets/js/gritter/css/jquery.gritter.css') }}
	{{ HTML::style('assets/lineicons/style.css') }}
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/style-responsive.css') }}
	{{ HTML::style('assets/css/jquery.timepicker.css') }}
	{{ HTML::style('assets/css/table-responsive.css') }}
</head>
<body>
	<section id="container">
		@include('backend.layout.header')
		@include('backend.layout.nav')
		<section id="main-content">
          	<section class="wrapper site-min-height">
          		@include("backend.layout.errors")
				@yield('content')
			</section>
		</section>

		<footer class="site-footer">
			<div class="text-center">
			  2014 - Alvarez.is
			</div>
		</footer>
	</section>

	{{ HTML::script('assets/js/jquery.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/validator.min.js') }}
	{{ HTML::script('assets/js/jquery.dcjqaccordion.2.7.js') }}
	{{ HTML::script('assets/js/jquery.scrollTo.min.js') }}
	{{ HTML::script('assets/js/jquery.nicescroll.js') }}
	{{ HTML::script('assets/js/jquery.sparkline.js') }}
	{{ HTML::script('assets/js/common-scripts.js') }}
	{{ HTML::script('assets/js/gritter/js/jquery.gritter.js') }}
	{{ HTML::script('assets/js/sparkline-chart.js') }}
	{{ HTML::script('assets/js/jquery.timepicker.js') }}
	{{ HTML::script('assets/js/customs.js') }}
		
</body>
</html>