
@extends("backend.layout.main")

@section("content")
  <input type="hidden" id='base_url' value="<?php echo URL::to('/'); ?>">
<p id="demo"></p>

@stop
