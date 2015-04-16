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
		public function prevdate(){
	$day=Input::get('day');
		$date=Input::get('date');
		 date_default_timezone_set("Asia/Katmandu"); 
		             $todate=date("Y-m-d"); 

		             if ($date<=$todate) {
		             	return "here";
		             }
		             {
		             		$parts = explode('-', $date);
								$datePlusFive = date(
								    'Y-m-d', 
								    mktime(0, 0, 0, $parts[1], $parts[2]-1 , $parts[0])
								    //              ^ Month    ^ Day + 5      ^ Year
								);	
		$day=$day-1;
		if ($day == 0) {
			$day=7;
			}				$data = array(
				'date'=>$datePlusFive,
			'day' => $day,
				'owner' => Input::get('owner')
		);
			return View::make("frontend.user.nextSchedulebook", $data);

		             }
			

		 }
		 		public function nxtdate(){
	$day=Input::get('day');
		$date=Input::get('date');
		 date_default_timezone_set("Asia/Katmandu"); 
		             $todate=date("Y-m-d"); 
		         
		             		$parts = explode('-', $date);
								$datePlusFive = date(
								    'Y-m-d', 
								    mktime(0, 0, 0, $parts[1], $parts[2]+1 , $parts[0])
								    //              ^ Month    ^ Day + 5      ^ Year
								);	
			$day=$day+1;
		if ($day == 8) {
			$day=1;
			}	
				$data = array(
				'date'=>$datePlusFive,
			'day' => $day,
				'owner' => Input::get('owner')
		);
			return View::make("frontend.user.nextSchedulebook", $data);

		          
			

		 }

	public function search(){
		$arenas = empty(Input::get("location")) ? Arena::all() : Arena::where("address", Input::get("location"))->get();
		$data = array(
			'id' => 'search',
			'title' => 'search results',
			'arena' => $arenas
		);

		return View::make("frontend.search", $data);
	}

}
