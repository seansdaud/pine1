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
			@yield('content')
		</div>
	</div>

	{{ HTML::script('assets/js/jquery.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/validator.min.js') }}
	{{ HTML::script('assets/js/frontend.js') }}

</body>
</html>