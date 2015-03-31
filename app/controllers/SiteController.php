<?php

class SiteController extends BaseController {

	public function index()
	{
			return View::make('frontend.home')->with("title", "Home");
	}
	public function getCurrent(){
		$lat = $_GET["lat"];
	$lng = $_GET["lng"];
	$radius = Input::get('radius');
	$result = Marker::select(
	                DB::raw("*, ( 3959 * acos( cos( radians('".$lat."') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('".$lng."') ) + sin( radians('".$lat."') ) * sin( radians( lat ) ) ) ) AS distances"))
	                ->having("distances", "<",$radius)
	           ->orderBy("distances")
	           
	                ->get();
	              
		//print_r(json_encode($result));
	                if ($result->isEmpty()) {
	                	return "noResult";
	                }
	                else{
	                	  $data = array('result' => $result);
	                	  return View::make('frontend.user.getNearestArena',$data);
	                }
	      
		}
}
