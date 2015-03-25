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
		@yield('content')
	</div>

</body>
</html>