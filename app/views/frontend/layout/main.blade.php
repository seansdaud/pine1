<!DOCTYPE html>
<html>
  @include('frontend.layout.header')
<body>
	<div class="container-fluid" style="padding-left:0; padding-right:0;">
		@include('frontend.layout.nav')
		<div class="container container-costum">
			@if($id != "user-profile")
				@include("frontend.layout.banner")
			@endif
			@yield('content')
		</div>
	</div>
	 
  @include('frontend.layout.footer')
</body>
</html>