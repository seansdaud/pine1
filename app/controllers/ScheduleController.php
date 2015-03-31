<?php 


class ScheduleController extends BaseController {


	public function createSchedule(){
		$data = array(
			'title' => 'create schedule',
			'id' => 'schedular'
		);
		return View::make("backend.owners.Schedule", $data);
	}
	public function 	deleteallschedule(){
			$adminid = Auth::id();
		Schedule::where('admin_id', $adminid )->delete();
			return Redirect::route("createschedule")->with("danger", "Schedule Removed!!");
	}
	public function addSchedule(){
		
		$adminid = Auth::id();
		Schedule::where('admin_id', $adminid )->delete();
		$diff=Input::get('diff');
		$j=-1;
		$result = array();
		for ($i=0; $i < $diff; $i++) { 
			for ($j=1; $j < 8; $j++) { 
					
						 $schedule = new Schedule;
					 $schedule->admin_id=$adminid;
					$schedule->time_diff=Input::get('diff');
					$schedule->start_time= Input::get('start_time'.$i);
					$schedule->end_time =Input::get('end_time'.$i);
					$schedule->price = Input::get($j.$i);
					$schedule->day=$j;
					$schedule->booking=$i;
					 $schedule->save(); 
			}
			
		

			
		}
		if($j== $diff-1){

			// print_r(json_encode($result));
		}
		else{
			// print_r("error");
		}
		return Redirect::route("updatePrice")->with("danger", "Schedule Created!!");
	}
	public function  updatePrice(){
		$adminid = Auth::id();
			$data = array(
				'id' => 'schedular',
			'schedular' => Schedule::where('admin_id', $adminid )->orderBy('booking', 'asc')->get()
		);
		return View::make("backend.owners.updatePrice", $data)->with("title", "Update Price");
	}
	public function postupdatePrice(){
			$adminid = Auth::id();

		$diff=Input::get('diff');
		$c=0;
		$k=0;
		$result = array();
		for ($i=0; $i < $diff; $i++) { 
			for ($j=1; $j < 8; $j++) { 
				$c++;
					$data = array(
					'id'=>Input::get('id'.$c),
					'admin_id'=>$adminid,
					'time_diff'=>Input::get('diff'),
					'start_time' => Input::get('start_time'.$c),
					'end_time' => Input::get('end_time'.$c),
					'price' => Input::get($j.$i),
					'day'=>$j,
				);
					$id=Input::get('id'.$c);
					if(Schedule::where('id', $id)->update($data)){
						$k++;
						array_push($result, Input::get('id'.$c));
					}
			}
			
		
			
		}
		
			if($k==$diff*7){
							print_r(1);
			
				}
	}
	public function searchuser(){
		$search_content=Input::get('mem');
				if ($search_content!=null) {

				 $result = User::where('username', 'LIKE', '%'.$search_content.'%')->where('usertype', 1)->get();
			 $result_count = User::where('username', 'LIKE', '%'.$search_content.'%')->where('usertype', 1)->count();
				if($result_count!=null){
				$suffix=($result_count != 1 )?'s':'';
				$res= array();
				foreach ($result as $key ) {
					$data = array(
					'id'=>$key->id,
					'uname'=> $key->username,
					);
					array_push($res, $data);
				}
				print_r(json_encode($res));
				}
				else{
					$res= array();
					$data = array(
					'uname'=> 'emptysetfound',
					);
					array_push($res, $data);
						print_r(json_encode($res));
				}
				}
				else{
						$res= array();
					$data = array(
					'uname'=> 'emptysetfound',
					);
					array_push($res, $data);
						print_r(json_encode($res));
				}

	}
	public function showSchedule(){
			$adminid = Auth::id();
			$data = array(
				'id' => 'schedular',
			'schedular' => Schedule::where('admin_id', $adminid )->get()
		);
		return View::make("backend.owners.showSchedule", $data)->with("title", "See Schedule");
	}
	public function bookSchedule($id){
			$adminid = Auth::id();
			$data = array(
				'nos'=>$id,
				'id' => 'schedular',
			'schedular' => Schedule::where('admin_id', $adminid )->get()
		);
		return View::make("backend.owners.bookSchedule", $data)->with("title", "Book Schedule");
	}
	public function prebookschedule($id){
		$emp=Input::get('user');
		if (empty($emp)) {
			$user=Session::get('usersname');
		}
		else{
				$user=Input::get('user');
		}
		if($id=="1"){
	
		$adminid = Auth::id();
		$data = array(
				'id' => 'schedular',
		);
		}
		Session::put('usersname',  $user);
		return View::make("backend.owners.prebookSchedule", $data)->with("title", "Book Schedule");
	}
	public function postbookschedule(){
			$adminid = Auth::id();
			$datename=Schedule::where('id', Input::get('key_id'))->get();
			if($datename[0]->book_status==0){
				 $book = new Booking;
					 $book->schedule_id=Input::get('key_id');
					  $book->user_id=Input::get('user_id');
					  $book->booking_date=Input::get('date');
					   $book->booked_price=Input::get('price');
					  $book->arena_id=$adminid;
					  $book->save(); 
						  $client = Schedule::findOrFail(Input::get('key_id'));

						$client->book_status=$book->id;
						$client->push();
						 $bookin = Booking::findOrFail($book->id);

						$bookin->status=$book->id;
						$bookin->push();
			}
			else{
				 $book = new Booking;
					 $book->schedule_id=Input::get('key_id');
					  $book->user_id=Input::get('user_id');
					  $book->booking_date=Input::get('date');
					     $book->booked_price=Input::get('price');
					  $book->arena_id=$adminid;
					  $book->save(); 
					   $bookin = Booking::findOrFail($book->id);

						$bookin->status=$datename[0]->book_status;
						$bookin->push();


			}
				 $schedule = new Scheduleinfo;
					$schedule->start_time=$datename[0]->start_time;
					$schedule->end_time =$datename[0]->end_time;
					$schedule->price = $datename[0]->price;
					$schedule->day=$datename[0]->day;
					$schedule->booking_id=$book->id;
					 $schedule->save(); 

			 return Redirect::to('/o/showSchedule')->with("danger", "Schedule Booked!!");
		
	}
	public function nextdate(){
		$day=Input::get('day');
		$date=Input::get('date');
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
			'day' => $day
		);
		if (Input::get('forwho')=="show") {
			return View::make("backend.owners.nextSchedule", $data);
		}
		else{
				return View::make("backend.owners.nextSchedulebook", $data);
		}
	
	}
	public function prevdate(){
	$day=Input::get('day');
		$date=Input::get('date');
		$parts = explode('-', $date);
								$datePlusFive = date(
								    'Y-m-d', 
								    mktime(0, 0, 0, $parts[1], $parts[2]-1 , $parts[0])
								    //              ^ Month    ^ Day + 5      ^ Year
								);	
		$day=$day-1;
		if ($day == 0) {
			$day=7;
			}	

			$data = array(
				'date'=>$datePlusFive,
			'day' => $day
		);

			if (Input::get('forwho')=="show") {
				return View::make("backend.owners.nextSchedule", $data);
			}
			else{
					return View::make("backend.owners.nextSchedulebook", $data);
			}
	}
	public function addscheduledown(){
			$start=Input::get('start_timedown');
			$end=Input::get('end_timedown');
		$numbering=Input::get('downbook');
		$parts = explode(':', $start);
		$hour=$parts[0]+1;
		$hourend=$parts[1];
		if ($hour==13) {
			$hour=1;

		}
		if ($hour==12 && $parts[1]=="00am") {
			$hourend="00pm";
		}
		if ($hour==12 && $parts[1]=="00pm") {
			$hourend="00am";
		}

		$parts1 = explode(':', $end);
		$hour1=$parts1[0]+1;
		$hourend1=$parts1[1];
		if ($hour1==13) {
			$hour1=1;

		}
		if ($hour1==12 && $parts1[1]=="00am") {
			$hourend1="00pm";
		}
		if ($hour1==12 && $parts1[1]=="00pm") {
			$hourend1="00am";
		}

		$newstart=$hour.":".$hourend;
		$newend=$hour1.":".$hourend1;
		$adminid = Auth::id();
			for ($j=1; $j < 8; $j++) { 
					
						 $schedule = new Schedule;
					 $schedule->admin_id=$adminid;
					$schedule->time_diff=Input::get('diff')+1;
					$schedule->start_time= $newstart;
					$schedule->end_time =$newend;
					$schedule->price = 0000;
					$schedule->day=$j;
						$schedule->booking=$numbering+1;
					 $schedule->save(); 
					
			}
			$variable= DB::table('schedules')->get();
					  foreach ($variable as $key) {
							$data = array(
					'time_diff'=>Input::get('diff')+1
					);
						Schedule::where('id', $key->id)->update($data);
						}
			 return Redirect::to('/o/createschedule')->with("danger", "Schedule Added!!");

	}

	public function delscheduledown(){
		$start=Input::get('start_timedown');
		$end=Input::get('end_timedown');
			$adminid = Auth::id();
		$variable=Schedule::where('admin_id', $adminid )->where('start_time', $start)->where('end_time', $end)->get();
	
	foreach ($variable as $key ) {
		Schedule::where('id', $key->id )->delete();
	}
	$variable= DB::table('schedules')->get();
					  foreach ($variable as $key) {
							$data = array(
					'time_diff'=>$key->time_diff-1
					);
						Schedule::where('id', $key->id)->update($data);
						}
		 return Redirect::to('/o/createschedule')->with("danger", "Schedule Deleted!");
	}
	public function addscheduleup(){
		$numbering=Input::get('downbook');
			$start=Input::get('start_timedown');
		$end=Input::get('end_timedown');
		$parts = explode(':', $start);
		$hour=$parts[0]-1;
		$hourend=$parts[1];
		if ($hour==0) {
			$hour=12;

		}
		if ($hour==11 && $parts[1]=="00am") {
			$hourend="00pm";
		}
		if ($hour==11 && $parts[1]=="00pm") {
			$hourend="00am";
		}

		$parts1 = explode(':', $end);
		$hour1=$parts1[0]-1;
		$hourend1=$parts1[1];
		if ($hour1==0) {
			$hour1=12;

		}
		if ($hour1==11 && $parts1[1]=="00am") {
			$hourend1="00pm";
		}
		if ($hour1==11 && $parts1[1]=="00pm") {
			$hourend1="00am";
		}

		$newstart=$hour.":".$hourend;
		$newend=$hour1.":".$hourend1;
		$adminid = Auth::id();
			for ($j=1; $j < 8; $j++) { 
					
						 $schedule = new Schedule;
					 $schedule->admin_id=$adminid;
					$schedule->time_diff=Input::get('diff');
					$schedule->start_time= $newstart;
					$schedule->end_time =$newend;
					$schedule->price = 0000;
					$schedule->day=$j;
						$schedule->booking=$numbering-1;
					 $schedule->save(); 
			}
			$variable= DB::table('schedules')->get();
					  foreach ($variable as $key) {
							$data = array(
					'time_diff'=>Input::get('diff')+1
					);
						Schedule::where('id', $key->id)->update($data);
						}
			 return Redirect::to('/o/createschedule')->with("danger", "Schedule Added!!");

	}
	public function viewLog(){
		$adminid = Auth::id();
		$layout = new \Illuminate\Database\Eloquent\Collection;
			$data = array(
				'id' => 'log',
					'history'=> $layout		);
		return View::make("backend.owners.showLog", $data)->with("title", "See Log");
	}
	public function getLog(){
		$adminid = Auth::id();
				$from=Input::get('getdate1');
				$to=Input::get('getdate2');
				if (empty($from) && empty($to)) {
				return Redirect::to('/viewLog')->with("danger", "Select a Date!!");
					}
					elseif (empty($to)) {
							$data= array(
						'title' => 'History',
					
						'id' => 'log',
							'posts'=>1,
						'history'=>Booking::where('arena_id',$adminid)->where('booking_date','>=',''.$from)->orderBy('booking_date', 'desc')->get(),
						'from'=>$from,
						'to'=>$to
					);
					}
					elseif (empty($from)) {
							$data= array(
						'title' => 'History',
						'id' => 'log',
							'posts'=>1,
							'history'=>Booking::where('arena_id',$adminid)->where('booking_date','<=',''.$to)->orderBy('booking_date', 'desc')->get(),
				
						'from'=>$from,
						'to'=>$to
					);
					}
					else{
				$data= array(
						'title' => 'History',
						'id' => 'log',
							'posts'=>1,
							'history'=>Booking::where('arena_id',$adminid)->where('booking_date','>=',''.$from)->where('booking_date','<=',''.$to)->orderBy('booking_date', 'desc')->get(),
						'from'=>$from,
						'to'=>$to
					);
			}
					return View::make("backend.owners.showLog", $data)->with("title", "View Log");
	}
	public function locator(){
		$data = array('id' => 'locator' );
		return View::make("backend.owners.locator",$data)->with("title", "locator");
	}
	public function getCurrent(){
		$lat = $_GET["lat"];
	$lng = $_GET["lng"];
	$radius = Input::get('radius');
	// $result = Marker::select(
 //                DB::raw("*,
 //                            ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) )
 //                            AS distances"))
 //                ->having("distances", "<",$radius)
 //            ->orderBy("distances")
 //                ->setBindings([$lat, $lng, $lat])

 //                ->get();
$result = Marker::select(
                DB::raw("*, ( 3959 * acos( cos( radians('".$lat."') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('".$lng."') ) + sin( radians('".$lat."') ) * sin( radians( lat ) ) ) ) AS distances"))
                ->having("distances", "<",$radius)
           ->orderBy("distances")
           
                ->get();
	print_r(json_encode($result));
	}


}
