<div style="margin-right:-15px!important; margin-left:-15px !important; background: #131D29;   border-bottom: 7px solid rgb(244, 60, 18); margin-bottom:20px;">
	<div class="row" >
		<div class="col-md-6 col-sm-6">
			<?php if(!empty($image)): ?>
				<?php $image = "assets/img/".$folder."/".$image; ?>
			<?php else: ?>
				<?php $image = "assets/img/4982__1753__gerrard1000_5425b91e0e98e402487932.jpg"; ?>
			<?php endif; ?>
				<img class="arena-banner" src="{{ asset($image) }}">
		</div>
		<div class="col-md-6 col-sm-6">
			<span style="display: block !important; position: absolute !important; width: 0 !important; height: 0 !important; border-bottom: 368px solid #131D29 !important; border-left: 259px solid transparent !important; left: -273px; top: 0;"></span>
			<span style="  display: block !important; position: absolute !important; width: 0 !important;  height: 0 !important; border-bottom: 220px solid #182737 !important; border-left: 160px solid transparent !important; right: 15px; top: 148px;"></span>
			<div class="arena-wrapper">
				<div class="arena-top">{{ $title }}</div>
				<div style="color:white; font-family:'Titillium Web', sans-serif;"><span style="color:#F43C12;">>>  </span><span class="lose">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span><span style="color:#F43C12;">  //</span></div>
			</div>
		</div>
	</div>
</div>