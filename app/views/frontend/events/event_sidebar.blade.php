<div class="row">
  <div class="col-md-5 col-sm-7 col-xs-5">
    
    <div class="cat-name" style="margin-bottom:17px;">
    <span class="base"><a href="{{ URL::route('events') }}" class="schedule">Events</a></span>
    <span class="arrow" style=" display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-top: 40px solid #F15620 !important; border-right: 40px solid transparent !important; right: -25px; top: 0"></span>
    </div>
  </div>
</div>
<?php if(!empty($owner_id)): ?>
    <?php $events = Events::where("owner_id", $owner_id)->take(3)->get(); ?>
<?php else: ?>
    <?php $events = Events::take(3)->get(); ?>
<?php endif; ?>
@foreach($events as $event)
    <?php $address = User::find($event->owner_id)->arena()->first(); ?>
	<div class="CoverImage FlexEmbed FlexEmbed--2by1 background" <?php if(!empty($event->image)): ?>style="background-image:url({{ URL::asset('assets/img/events/thumb/'.$event->image) }})"<?php endif; ?>>
         <?php $slug = Str::slug($event->name); ?>
	     <a href="{{ URL::route('event', array($event->id, $slug)) }}"><div class="text-over">{{ $event->name }}</div></a>
	     <div class="sept">{{ $address->address }}</div>
	     <div class="gaira">{{ date("d M", strtotime($event->start)) }} - {{ date("d M", strtotime($event->start)) }}</div>
	     <div class="layer"></div>
	</div>
@endforeach