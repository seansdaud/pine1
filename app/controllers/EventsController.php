<?php 


class EventsController extends BaseController {

	public function getOwnerEvents(){
		$data = array(
			"id" => "events",
			'title' => 'events',
			'events' => Events::all()
		);

		return View::make("backend.owners.events", $data);
	}

	public function createNewEvent(){
		$data = array(
			'id' => 'events',
			'title' => 'add new event',
			'users' => User::where("usertype", "=", "1")->get(),
			'arenas' => User::where("username", "=", Auth::user()->username)->firstOrFail()
		);

		return View::make("backend.owners.event_new", $data);
	}

	public function postOwnerEvents(){
		$event = array(
			"name" => Input::get("name"),
			"arena_id" => Input::get("arena"),
			"user_id" => Input::get("master")
		);

		if(Events::create($event)){
			return Redirect::route("owner-events")->with("success", "Event Successfully created.");
		}
		return Redirect::route("owner-event-new")->withInput()->with("danger", "Something went wrong. Please try again.");
	}

}