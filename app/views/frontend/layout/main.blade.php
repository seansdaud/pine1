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
	<div class="footer">
		footer
	</div>
	{{ HTML::script('assets/js/jquery.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/validator.min.js') }}
	{{ HTML::script('assets/js/frontend.js') }}

</body>
</html>