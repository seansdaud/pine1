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
	{{ HTML::style('assets/css/select2.min.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Ropa+Sans') }}
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>