<?php

class SiteController extends BaseController {

	public function index()
	{
		$code = str_random(60);
		$data = array(
			'id' => 'home',
			'title' => 'home'
		);
		return View::make('frontend.home', $data);
	}

	function arenas(){
		$data = array(
			'id' => 'arenas',
			'title' => 'arenas',
			'arenas' => Arena::all()
		);
		return View::make("frontend.arenas.arenas", $data);
	}

	function arenaDetail($id){
		$arena = Arena::where("id", "=", $id);
		if(!$arena->count()){
			App::abort(404);
		}
		$data = array(
			'id' => 'arenas',
			'title' => $arena->first()->name,
			'arena' => $arena->first()
		);

		return View::make("frontend.arenas.profile", $data);
	}

	function about(){
		$data = array(
			'id' => 'about',
			'title' => 'about'
		);
		return View::make("frontend.about", $data);
	}

	function contact(){
		$data = array(
			'id' => 'contact',
			'title' => 'contact'
		);
		return View::make("frontend.contact", $data);
	}
	function submit_query(){
		$email=Input::get('name');
		$username=Input::get('email');
		$query=Input::get('query');
		Mail::send('frontend.email.query',array(
						'from'=>$email,
						'name'=>$username,
						'query'=>$query
					), function($message){
					$message->to("prachanda.gurung@gmail.com", "futsal")->subject('Inquiry');
				});
		return Redirect::route('contact')
						->with('success','Your query has been submitted! We will reply you within a two working days');
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
		public function getArena(){
			return "ASdsd";
		}
}
