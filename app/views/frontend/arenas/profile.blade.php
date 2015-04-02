@extends("frontend.layout.main")

@section("content")
	<?php if(!empty($arena->banner)): ?>
		<?php $asset = "assets/img/arena/".$arena->banner; ?>
	<?php else: ?>
		<?php $asset = 'assets/img/stadium.jpg'; ?>
	<?php endif; ?>
	<img width="100%" height="auto" src="{{ asset($asset) }}">

	{{ $arena->name }}

	<div>
		@foreach($arena->reviews as $review)

			<?php $review_from = User::where("id", "=", $review->user_id)->first(); ?>
			<b>{{ ucfirst($review_from->name) }}</b>
			<p>
				{{ ucfirst($review->review) }}
				<small>
					<?php echo $date = date("d M Y", strtotime($review->created_at)); ?>
					<?php if((int)date("H", strtotime($review->created_at)) > 12): ?>
						<?php echo date("h:m", strtotime($review->created_at))." pm"; ?>
					<?php else: ?>
						<?php echo date("h:m", strtotime($review->created_at))." am"; ?>
					<?php endif; ?>
				</small>
			</p>

		@endforeach
	</div>

	{{ Form::open(array('route' => 'add-review', 'class' => 'form-horizontal style-form', 'data-toggle' => 'validator', 'id'=>'review-form', 'style'=>'display:none;')) }}
		<div id="characters"></div>
		<div class="form-group">
			<textarea name="review" class="form-control" placeholder="Write short review for this arena" required maxlength="200"></textarea>
		</div>
		<input type="hidden" name="arena_id" value="{{ $arena->id }}">
		<div class="form-group">
			<input type="submit" value="Submit" class="btn btn-info">
		</div>

	{{ Form::close() }}

@stop