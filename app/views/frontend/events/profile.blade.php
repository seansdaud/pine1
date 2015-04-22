@extends('frontend.layout.main')

@section('content')
	<div class="row">
		<div class="col-md-4 col-sm-4 shade">
			<div class="row">
				<div class="col-md-7 col-sm-7 col-xs-9">
					<div class="cat-name">
		                <span class="base schedule">Manager</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<div class="manager-wrap">
				<div>
					@if(!empty($event->manager->image))
						<?php $asset = "assets/img/profile/user/".$event->manager->image; ?>
					@else
						<?php $asset = "assets/img/ui-sherman.jpg" ?>
					@endif
					<img src="{{ asset($asset) }}" class="img-profilee img-circle">
				</div>
				<div class ="par">{{ ucfirst($event->manager->name) }}</div>
				
			</div>
		</div>
		<div class="col-md-8 col-sm-8">
			<div class="detail-wrap">
			<div class="row">
				<div class="col-md-4 ">
					<span class="glyphicon glyphicon-calendar gly-calendar"></span>
					<span class="names">
						{{ date("M d", strtotime($event->start)) }} - {{ date("M d", strtotime($event->end)) }}
					</span>
				</div>
				<div class="col-md-4 ">
					<span class="glyphicon glyphicon-map-marker gly-calendar"></span>
					<?php $address = User::find($event->owner_id)->arena()->first(); ?>
					<a href="{{ URL::route('arena-detail', $address->id) }}">
						<span class="names">{{ $address->name }}</span>
					</a>
				</div>
				<div class="col-md-4 ">
					<span class="glyphicon glyphicon-time gly-calendar"></span>
					<span class="names">
						<?php if((int)date("H", strtotime($event->start)) > 12): ?>
							<?php echo date("h:m", strtotime($event->start))." pm"; ?>
						<?php else: ?>
							<?php echo date("h:m", strtotime($event->start))." am"; ?>
						<?php endif; ?> - 
						<?php if((int)date("H", strtotime($event->end)) > 12): ?>
							<?php echo date("h:m", strtotime($event->end))." pm"; ?>
						<?php else: ?>
							<?php echo date("h:m", strtotime($event->end))." am"; ?>
						<?php endif; ?>
					</span>
				</div>
			</div>

			</div>
			<div class="row">
				<div class="col-md-3 col-sm-7 col-xs-9">
					<div class="cat-name">
		                <span class="base schedule">Description</span>
		                <span class="arrow"></span>
	                </div>
				</div>
			</div>
			<div class="disc-wrap">{{ $event->detail }}</div>
		</div>
	</div>

@stop