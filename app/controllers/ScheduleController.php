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
		return Redirect::route("updatePrice")->with("danger", "Schedule Created!!");
	}
	public function  updatePrice(){
		$adminid = Auth::id();
			$data = array(
				'id' => 'schedular',
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
		$search_content=Input::get('mem');
				if ($search_content!=null) {

				 $result = User::where('username', 'LIKE', '%'.$search_content.'%')->get();
			 $result_count = User::where('username', 'LIKE', '%'.$search_content.'%')->count();
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
		return View::make("backend.admin.showSchedule", $data)->with("title", "See Schedule");
	}
	public function bookSchedule($id){
			$adminid = Auth::id();
			$data = array(
				'nos'=>$id,
				'id' => 'schedular',
			'schedular' => Schedule::where('admin_id', $adminid )->get()
		);
		return View::make("backend.admin.bookSchedule", $data)->with("title", "Book Schedule");
	}
	public function prebookschedule(){
		if (empty(Input::get('which'))) {
			
		}
		$type=Input::get('which');

		if($type=="1"){
		$user=Input::get('user');
		$adminid = Auth::id();
		$data = array(
				'id' => 'schedular',
				'usersname' => $user
		);
		}
		return View::make("backend.admin.prebookSchedule", $data)->with("title", "Book Schedule");
	}
	public function postbookschedule(){
			$adminid = Auth::id();
			$datename=Schedule::where('id', Input::get('key_id'))->get();
			if($datename[0]->book_status==0){
				 $book = new Booking;
					 $book->schedule_id=Input::get('key_id');
					  $book->user_id=Input::get('user_id');
					  $book->booking_date=Input::get('date');
					  $book->arena_id=$adminid;
					  $book->save(); 
			}
			else{

			}
		
	}
}
