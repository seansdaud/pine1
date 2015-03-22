<?php 

class TasksController extends BaseController {

	function getTasks(){
		$data = array(
			'title' => 'tasks',
			'id' => 'tasks',
			'tasks' => Task::where("completed", "=", 0)->paginate(2)
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

	public function getAjaxTasks(){
		if(Input::get("type") == "all-tasks"){ 
			$tasks = Task::where("completed", "=", 0)->paginate(2);
			$tasks->setBaseUrl('tasks');
			?>
			<?php foreach($tasks as $task): ?>
				<div class="desc" id="<?php echo $task->id; ?>">
					<div class="thumb">
						<span class="badge"><i class="fa fa-arrow-right"></i></span>
					</div>
					<div class="details">
						<p>
							<muted><?php echo date("d M Y", strtotime($task->created_at)); ?></muted>
								<div class="btn dropdown" style="float: right;top: -30px;">
								<span class="glyphicon glyphicon-chevron-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></span>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('delete-task', $task->id); ?>" id="move-to">Delete</a></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-completed', $task->id); ?>" id="move-to">Mark Completed</a></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-importent', $task->id); ?>" id="move-to">Important</a></li>
								</ul>
								</div>
							<div style="position:absolute;">
								<?php echo $task->task; ?>
							</div>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
			<?php echo $tasks->links(); ?>
		<?php 
		}

		if(Input::get("type") == "important-tasks"){ ?>
			<?php 
				$tasks = Task::where("completed", "=", 0)->where("important", "=", 1)->paginate(2);
				$tasks->setBaseUrl('tasks');
			?>
			<?php foreach($tasks as $task): ?>
				<div class="desc" id="<?php echo $task->id; ?>">
					<div class="thumb">
						<span class="badge"><i class="fa fa-arrow-right"></i></span>
					</div>
					<div class="details">
						<p>
							<muted><?php echo date("d M Y", strtotime($task->created_at)); ?></muted>
								<div class="btn dropdown" style="float: right;top: -30px;">
								<span class="glyphicon glyphicon-chevron-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></span>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('delete-task', $task->id); ?>" id="move-to">Delete</a></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-completed', $task->id); ?>" id="move-to">Mark Completed</a></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-not-importent', $task->id); ?>" id="move-to">Not Important</a></li>
								</ul>
								</div>
							<div style="position:absolute;">
								<?php echo $task->task; ?>
							</div>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
			<?php echo $tasks->links(); ?>
		<?php
		}

		if(Input::get("type") == "completed-tasks"){ ?>
			<?php $tasks = Task::where("completed", "=", 1)->orderBy("updated_at", "desc")->paginate(2); ?>
			<?php $tasks->setBaseUrl('tasks'); ?>
			<?php foreach($tasks as $task): ?>
				<div class="desc" id="<?php echo $task->id; ?>">
					<div class="thumb">
						<span class="badge"><i class="fa fa-arrow-right"></i></span>
					</div>
					<div class="details">
						<p>
							<muted><?php echo date("d M Y", strtotime($task->created_at)); ?></muted>
								<div class="btn dropdown" style="float: right;top: -30px;">
								<span class="glyphicon glyphicon-chevron-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></span>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('delete-task', $task->id); ?>" id="move-to">Delete</a></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-not-completed', $task->id); ?>" id="move-to">Not Completed</a></li>
								</ul>
								</div>
							<div style="position:absolute;">
								<?php echo $task->task; ?>
							</div>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
			<?php echo $tasks->links(); ?>
		<?php
		}
	}

	public function deleteTask(){
		if($task = Task::find(Input::get("id"))){
			$task->delete();
			echo "success";
		}
	}

	public function completeTask(){
		if($task = Task::find(Input::get("id"))){
			$task->completed = 1;
			if($task->save()){
				echo "success";
			}
		}
	}

	public function impTask(){
		if($task = Task::find(Input::get("id"))){
			$task->important = 1;
			if($task->save()){
				echo "success";
			}
		}
	}

	public function NimpTask(){
		if($task = Task::find(Input::get("id"))){
			$task->important = 0;
			if($task->save()){
				echo "success";
			}
		}
	}

	public function NcompTask(){
		if($task = Task::find(Input::get("id"))){
			$task->completed = 0;
			if($task->save()){
				echo "success";
			}
		}
	}

}