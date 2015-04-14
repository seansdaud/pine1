@extends("frontend.layout.main")

@section("content")
	<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:20px;">
		<div class="row" >
			<div class="col-md-6 col-sm-6">
				<img class="arena-banner" src="{{ asset('assets/img/stadium.jpg') }}">
			</div>
			<div class="col-md-6 col-sm-6">
				<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
				<span style="  display: block !important; position: absolute !important; width: 0 !important;  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; top: 148px;"></span>
				<div class="arena-wrapper">
					<div class="arena-top">Futsal Arenas</div>
					<div style="color:white; font-family:'Titillium Web', sans-serif;"><span style="color:#F43C12;">>>  </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<span style="color:#F43C12;">  //</span></div>
				</div>
			</div>
		</div>
	</div>

	<?php $row_closed=null; $i=0; foreach($arenas as $arena): $i++; ?>
		<?php if($i==1): $row_closed=false; ?>
			<div class="row" style="margin-bottom:15px;">
		<?php endif; ?>
				<div class="col-md-6">
					<div style="  background: #131D29;">
					<div class="row">
						<div class="col-md-7">
							<?php if(!empty($arena->banner)): ?>
								<?php $asset = "assets/img/arena/thumb/".$arena->banner; ?>
							<?php else: ?>
								<?php $asset = 'assets/img/stadium.jpg'; ?>
							<?php endif; ?>
							<a href="{{ URL::route('arena-detail', $arena->id) }}">
								<img style="  width: 100%; height: 202px" src="{{ asset($asset) }}">
							</a>
							<span class="img-side"></span> 	
						</div>
						<div class="col-md-5">
							<span class="a-traingle1"></span>
		  					<span class="a-traingle"></span>
						 <div class="arena-content">
							<a href="{{ URL::route('arena-detail', $arena->id) }}">
								<div class="a-arena">{{ ucfirst($arena->name) }}</div>
							</a>
							<div>{{ ucfirst($arena->address) }}</div>
							<div>
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
	<?php if($row_closed==false): ?>
		</div>
	<?php endif; ?>

@stop