<?php 


class EventsController extends BaseController {

	public function getOwnerEvents(){
		$data = array(
			"id" => "events",
			'title' => 'events',
			'events' => Events::where("owner_id", "=", Auth::user()->id)->get()
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

}