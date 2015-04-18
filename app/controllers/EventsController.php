<?php 


class EventsController extends BaseController {

	public function getOwnerEvents(){
		$data = array(
			"id" => "events",
			'title' => 'events',
			'events' => Events::where("owner_id", "=", Auth::user()->id)->withTrashed()->get()
		);

		return View::make("backend.owners.events", $data);
	}

	public function createNewEvent(){
		$data = array(
			'id' => 'events',
			'title' => 'add new event',
			'users' => User::where("usertype", "=", "1")->get()
		);

		return View::make("backend.owners.event_new", $data);
	}

	public function postOwnerEvents(){



		$event = Events::create(
				array(
						"name" => Input::get("name"),
						"owner_id" => Auth::user()->id,
						"user_id" => Input::get("master")
					)
			);

				if($event){
								$user=User::where("id",Input::get("master"))->first();
		$userevent=new User;
		$userevent->name=Input::get("name");
		$userevent->contact=$user->contact;
		$userevent->save();
		$data = array(
					'event_id'=>$userevent->id,
				);
		Events::where('id', $event->id)->update($data);
			$from=Input::get('getdate1');
				$to=Input::get('getdate2');
			$start=Input::get('start_time1');
				$end=Input::get('end_time1');
				$datetime1 = new DateTime($from);
$datetime2 = new DateTime($to);
$interval = $datetime1->diff($datetime2);
$diff=$interval->format('%a');
	
			for ($j=0; $j < 2; $j++) {

				$from_date=$from;
				$adminid = Auth::id();

				for ($i=0; $i < $diff+1; $i++) {
						$forday = strtotime("+0 day", strtotime($from_date));
						$ford= date("Y-m-d", $forday);

						$day = date('w', $forday);
						$day=$day+1;

					
		$schedule=Schedule::where('admin_id',$adminid)->where('day',$day)->orderBy('booking', 'asc')->get();	
		$flag=0;	


						foreach ($schedule as $key) {
						

										if ($key->start_time==$start) {
								$flag=1;
							}

							if ($key->start_time==$end) {
								$flag=0;
							}
							if ($flag==1) {
								if ($j==0) {
								$check=Booking::where('schedule_id',$key->id)->where('booking_date',$from_date)->count();
								if ($check>0) {
									User::where('id',$userevent->id)->delete();
									Events::where('id',$event->id)->delete();
									return Redirect::route("owner-events")->with("danger", $key->start_time." to ".$key->end_time." for ".$from_date. "  is Already Booked!!");
										
								}
								}
								else{
															$adminid = Auth::id();
			$datename=Schedule::where('id', $key->id)->get();
			if($datename[0]->book_status==0){
				 $book = new Booking;
					 $book->schedule_id= $key->id;
					  $book->user_id=$userevent->id;
					  $book->booking_date=	$from_date;
					   $book->booked_price=$key->price;
					  $book->arena_id=$adminid;
					  $book->save(); 
						  $client = Schedule::findOrFail( $key->id);

						$client->book_status=$book->id;
						$client->push();
						 $bookin = Booking::findOrFail($book->id);

						$bookin->status=$book->id;
						$bookin->push();
			}
			else{
				 $book = new Booking;
					 $book->schedule_id=$key->id;
					  $book->user_id=$userevent->id;
					  $book->booking_date=	$from_date;
					     $book->booked_price=$key->price;
					  $book->arena_id=$adminid;
					  $book->save(); 
					   $bookin = Booking::findOrFail($book->id);

						$bookin->status=$datename[0]->book_status;
						$bookin->push();


			}
				 $schedule = new Scheduleinfo;
					$schedule->start_time=$key->start_time;
					$schedule->end_time =$key->end_time;
					$schedule->price = $key->price;
					$schedule->day=$key->day;
					$schedule->booking_id=$book->id;
					$schedule->save();
					$booking_info=Booking::where("id","=",$book->id)->first(); 
					$arena=Arena::where("user_id",$booking_info->arena_id)->first();
					$user_id=Input::get('user_id');
					$user_info=User::where("id", "=", $user_id)->first();
							}
							}
						}
						$date = strtotime("+1 day", strtotime($from_date));
						$from_date= date("Y-m-d", $date);

											
					}
				}
			return Redirect::route("owner-events")->with("success", "Event Successfully created.");
		}
		return Redirect::route("owner-event-new")->withInput()->with("danger", "Something went wrong. Please try again.");
	}

	public function editOwnerEvent($id){
		$data = array(
			'id' => 'events',
			'title' => 'edit event',
			'event' => Events::findOrFail($id),
			'users' => User::where("usertype", "=", "1")->get()
		);

		return View::make("backend.owners.edit_event", $data);
	}

	public function editOwnerEventPost(){
		$event = Events::find(Input::get("id"));
		$event->user_id = Input::get("master");
		if($event->save()){
			return Redirect::route("owner-event-edit", Input::get("id"))->with("success", "Event updated.");
		}
		return Redirect::route("owner-event-edit", Inpute::get("id"))->with("danger", "Error. Try Again.");
	}
	public function deleteEvents($id){
		$event = Events::find($id);
		if($event->delete()){
			return Redirect::route("owner-events")->with("success", "Event Hidden.");
		}
		return Redirect::route("owner-events")->with("danger", "Error. Try Again.");

	}
	public function showEvents($id){
		$event = Events::onlyTrashed()->where('id', $id)->first();
			if($event->restore()){
			return Redirect::route("owner-events")->with("success", "Event Showed.");
		}
		return Redirect::route("owner-events")->with("danger", "Error. Try Again.");
	}
		public function deleteallEvents($id){
		
		$event = Events::withTrashed()->where('id', $id)->first();
	
		$nid=$event->event_id;
		
		//if(!$event->isEmpty()){
						$event->forceDelete();
			User::where('id',$nid)->delete();

			$books=Booking::where('user_id',$nid)->get();
			foreach ($books as $key) {
				Scheduleinfo::where('id',$key->scheduleinfo->id)->delete();
			}
			Booking::where('user_id',$nid)->delete();
			return Redirect::route("owner-events")->with("success", "Event Deleted Completely.");
		//}
		//return Redirect::route("owner-events")->with("danger", "Error. Try Again.");

	}
}