@extends("frontend.layout.main")

@section("content")
	<?php $row_closed=null; $i=0; foreach($arenas as $arena): $i++; ?>

		<?php if($i==1): $row_closed=false; ?>
			<div class="row" style="margin-bottom:15px;">
		<?php endif; ?>
				<div class="col-md-6 col-sm-6">
					<div style="  background: #131D29;">
					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<?php if(!empty($arena->banner)): ?>
								<?php $asset = "assets/img/arena/thumb/".$arena->banner; ?>
							<?php else: ?>
								<?php $asset = 'assets/img/stadium.jpg'; ?>
							<?php endif; ?>
							<a href="{{ URL::route('arena-detail', $arena->id) }}">
								<img class="arena-lists" src="{{ asset($asset) }}">
							</a>
							<span class="img-side"></span> 	
						</div>
						<div class="col-md-5 col-sm-5 col-xs-5">
							<span class="a-traingle1"></span>
		  					<span class="a-traingle"></span>
						 <div class="arena-content">
							<a href="{{ URL::route('arena-detail', $arena->id) }}">
								<div class="a-arena">{{ ucfirst($arena->name) }}</div>
							</a>
							<div style="position: relative; margin-left: -13px">{{ ucfirst($arena->address) }}</div>
							<div style="position: relative;  margin-left: -36px;">
								<?php $chars = substr($arena->phone, 0, 2); ?>
								<?php $chars3 = substr($arena->phone, 0, 3); ?>
								<?php if($chars=="98"): ?>
									<?php echo "+977-".$arena->phone; ?>
								<?php elseif($chars=="01" && $chars3!="010"): ?>
									<?php echo "+977-".$chars." - ".substr($arena->phone, 2, strlen($arena->phone)); ?>
								<?php else: ?>
									<?php echo "+977-".$chars3."-".substr($arena->phone, 3, strlen($arena->phone)); ?>
								<?php endif; ?>
							</div>
						 </div>
						</div>
					</div>
					</div>
				</div>
		<?php if($i==2): $row_closed=true; $i=0; ?>
			</div>
		<?php endif; ?>

	<?php endforeach; ?>
	<?php if($row_closed==false || $row_closed==null): ?>
		</div>
	<?php endif; ?>

@stop