@extends('frontend.layout.main')

@section('content')
	<div class="masonry">
		@foreach($events as $event)
			<div class="item">
				@if(!empty($event->image)):
				  	<div>
				  		<img style="width:100%;" src="{{ asset('assets/img/events/thumb/'.$event->image) }}">
				  	</div>
			  	@endif
			  	<a href="{{ URL::route('event', array($event->id, Str::slug($event->name))) }}"><div class="event-eve">{{ $event->name }}</div></a>
			  	<div style="  padding: 5px 6%;">
			  		<div class="feb-bind">
						<span class="feb">{{ date("M", strtotime($event->start)) }}</span><br>
						<span class="date">{{ date("d", strtotime($event->start)) }}</span>
					</div>
					<div class="wrapper-eve">
						<div><span class="glyphicon glyphicon-time"></span>
							<?php echo $event->start_time;  ?>  to  <?php echo $event->end_time;  ?>
						</div>
						<div><span class="glyphicon glyphicon-map-marker"></span>
							<?php $address = User::find($event->owner_id)->arena()->first(); ?>
							{{ $address->name }}
						</div>
					</div>
			  	</div>
			  	<div style="  padding: 5px 10px;">
			  		{{ Str::words($event->detail, 15) }}
			  	</div>
			</div>
		@endforeach
	</div>	

@stop