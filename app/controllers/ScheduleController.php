<?php 


class ScheduleController extends BaseController {


	public function createSchedule(){
		return View::make("backend.admin.Schedule")->with("title", "Create Schedule");
	}
	public function addSchedule(){
	
	}
}
