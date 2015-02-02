<?php 


class ScheduleController extends BaseController {


	public function createSchedule(){
		$data = array(
			'title' => 'create schedule',
			'id' => 'schedular'
		);
		return View::make("backend.admin.Schedule", $data);
	}
	public function addSchedule(){
		
		$adminid = Auth::id();

		// $this->work_model->delete_schedule($adminid);
		// $reserve = new Reserves;
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
	}
}
