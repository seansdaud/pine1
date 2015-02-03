<?php 

class TasksController extends BaseController {

	function getTasks(){
		$data = array(
			'title' => 'tasks',
			'id' => 'tasks',
			'tasks' => Task::all()
		);
		return View::make("backend.admin.tasks", $data);
	}

	public function addNewTask(){
		$imp =  (Input::get("important") == "true") ? true : false;
		$task = Task::Create(array(
			'task' => Input::get("task"),
			'important' => $imp,
			'completed' => 0
		));
		if($task){
			echo "true";
		}
		else{
			echo "false";
		}
	}

}