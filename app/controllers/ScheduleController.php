<?php 


class ScheduleController extends BaseController {


	public function createSchedule(){
		return View::make("backend.admin.Schedule")->with("title", "Create Schedule");
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
					 $schedule->save(); 
			}
			
		

			
		}
		if($j== $diff-1){

			// print_r(json_encode($result));
		}
		else{
			// print_r("error");
		}
		return View::make("backend.admin.Schedule")->with("title", "Create Schedule");
	}
}
