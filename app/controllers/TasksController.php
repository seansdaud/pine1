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

	public function getAjasTasks(){
		$tasks = Task::all();
		if(Input::get("type") == "all-tasks"){ ?>
			<?php foreach($tasks as $task): ?>
				<?php if($task->completed == 0): ?>
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
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('delete-task', $task->id); ?>" id="delete-task">Delete</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-completed', $task->id); ?>" id="mark-completed">Mark Completed</a></li>
									</ul>
									</div>
								<br>
								<?php echo $task->task; ?>
							</p>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php 
		}

		if(Input::get("type") == "important-tasks"){ ?>
			<?php foreach($tasks as $task): ?>
				<?php if($task->important == 1 && $task->completed == 0): ?>
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
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('delete-task', $task->id); ?>" id="delete-task">Delete</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-completed', $task->id); ?>" id="mark-completed">Mark Completed</a></li>
									</ul>
									</div>
								<br>
								<?php echo $task->task; ?>
							</p>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php
		}

		if(Input::get("type") == "completed-tasks"){ ?>
			<?php $tasks = Task::where("completed", "=", 1)->orderBy("updated_at", "desc")->get(); ?>
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
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('delete-task', $task->id); ?>" id="delete-task">Delete</a></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo URL::route('mark-completed', $task->id); ?>" id="mark-completed">Mark Completed</a></li>
								</ul>
								</div>
							<br>
							<?php echo $task->task; ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		<?php
		}
	}

	public function deleteTask(){
		if($task = Task::find(Input::get("id"))){
			$task->delete();
			echo "deleted";
		}
		else{
			echo "empty";
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

}