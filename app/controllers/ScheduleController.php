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
	public function  updatePrice(){
		$adminid = Auth::id();
			$data = array(
			'schedular' => Schedule::where('admin_id', $adminid )->get()
		);
		return View::make("backend.admin.updatePrice", $data)->with("title", "Update Price");
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
					'day'=>$j
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
		
	}
	public function showSchedule(){
			$adminid = Auth::id();
			$data = array(
			'schedular' => Schedule::where('admin_id', $adminid )->get()
		);
		return View::make("backend.admin.showSchedule", $data)->with("title", "See Schedule");
	}
	public function bookSchedule($id){
			$adminid = Auth::id();
			$data = array(
				'nos'=>$id,
			'schedular' => Schedule::where('admin_id', $adminid )->get()
		);
		return View::make("backend.admin.bookSchedule", $data)->with("title", "Book Schedule");
	}
}
