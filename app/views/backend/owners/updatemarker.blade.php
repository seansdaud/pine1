@extends('backend.layout.main')

@section("content")

<?php if ($info->isEmpty()):?>
 	  <h4 class="mb"><i class="fa fa-angle-right"></i> Update</h4>
 	  {{ Form::open(array( 'route' => 'createMaps','class'=>'form-horizontal style-form', 'method'=>'post')) }}
 	  <div class="form-group">
 	  	<label class="col-sm-2 control-label">Latitude</label>
			<div class="col-sm-10">
				<input type="text" name="lat" class="form-control" placeholder="latitude of your Map" required>
			</div>
			<label class="col-sm-2 control-label">Longitude</label>
			<div class="col-sm-10">
				<input type="text" name="lng" class="form-control" placeholder="longitude of your Map" required>
			</div>
		
			<label class="col-sm-2 control-label">Map Iframe Code</label>
			<div class="col-sm-10">
				<input type="text" name="iframe" class="form-control" placeholder="" required>
			</div>
			<div class="form-group">
			<input type="submit" value="Add" class="col-sm-offset-2 btn btn-default">
			</div>
		</div>
 	  {{ Form::close() }}
 	<?php else: ?>
 		  <h4 class="mb"><i class="fa fa-angle-right"></i> Update</h4>
 	  {{ Form::open(array( 'route' => 'createMaps','class'=>'form-horizontal style-form', 'method'=>'post')) }}
 	  <div class="form-group">
						<label class="col-sm-2 control-label">Latitude</label>
			<div class="col-sm-10">
				<input type="text" name="lat" class="form-control" value="<?php echo $info[0]->lat; ?>" required>
			</div>
			<label class="col-sm-2 control-label">Longitude</label>
			<div class="col-sm-10">
				<input type="text" name="lng" class="form-control" value="<?php echo $info[0]->lng; ?>" required>
			</div>

			<label class="col-sm-2 control-label">Map Iframe Code</label>
			<div class="col-sm-10">
			<textarea  name="iframe" class="form-control" style="height: 158px;">
				<?php echo $info[0]->map; ?>
			</textarea>
			
			</div>
			<div class="form-group">
			<input type="submit" value="Add" class="col-sm-offset-2 btn btn-default">
			</div>
		</div>
 	  {{ Form::close() }}
<?php endif; ?>
@stop