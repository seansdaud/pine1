@extends("backend.layout.main")

@section("content")
	<div class="row mt">
		<div class="col-lg-12 ds todos">
			<ul class="nav nav-tabs" id="tasks-tab" role="tablist">
				  <li role="presentation" class="active"><a href="#all-tasks" role="tab" data-toggle="tab" aria-controls="tasks">All</a></li>
				  <li role="presentation"><a href="#important-tasks" role="tab" data-toggle="tab" aria-controls="important-tasks">Important</a></li>
				  <li role="presentation"><a href="#completed-tasks" role="tab" data-toggle="tab" aria-controls="completed-tasks">Completed</a></li>
				  <li role="presentation"><a href="#add-task" role="tab" data-toggle="tab" aria-controls="add-task">Add New</a></li>
			</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="all-tasks" aria-labelledBy="all-tasks">
					@foreach($tasks as $task)
						<div class="desc">
							<div class="thumb">
								<span class="badge"><i class="fa fa-arrow-right"></i></span>
							</div>
							<div class="details">
								<p>
									<muted>{{ date("d M Y", strtotime($task->created_at)) }}</muted><br>
									{{ $task->task }}
								</p>
							</div>
							<div style="float:right;font-size: 15px;right: 10%;position: absolute;">
								<a href="" data-toggle="tooltip" title="Mark Completed"><i class="fa fa-check"></i></a>
							</div>
						</div>
					@endforeach
				</div>

				<div role="tabpanel" class="tab-pane fade" id="important-tasks" aria-labelledBy="important-tasks">
					@foreach($tasks as $task)
						@if($task->important == "1")
							<div class="desc">
								<div class="thumb">
									<span class="badge"><i class="fa fa-arrow-right"></i></span>
								</div>
								<div class="details">
									<p>
										<muted>{{ date("d M Y", strtotime($task->created_at)) }}</muted><br>
										{{ $task->task }}
									</p>
								</div>
								<div style="float:right;font-size: 15px;right: 10%;position: absolute;">
									<i class="fa fa-check"></i>						
								</div>
							</div>
						@endif
					@endforeach
				</div>

				<div role="tabpanel" class="tab-pane fade" id="completed-tasks" aria-labelledBy="completed-tasks">
					@foreach($tasks as $task)
						@if($task->completed == "1")
							<div class="desc">
								<div class="thumb">
									<span class="badge"><i class="fa fa-arrow-right"></i></span>
								</div>
								<div class="details">
									<p>
										<muted>26 Jan. 2015</muted><br>
										Enjoy Life comp.
									</p>
								</div>
								<div style="float:right;font-size: 15px;right: 10%;position: absolute;">
									<i class="fa fa-check"></i>						
								</div>
							</div>
						@endif
					@endforeach
				</div>

				<div role="tabpanel" class="tab-pane fade" id="add-task" aria-labelledBy="add-task">
					{{ Form::open(array("route" => "add-task", "class"=>"form-horizontal", "data-toggle"=>"validator", "id"=>"add-task-form", "style"=>"margin-left:15px;")) }}

						<div class="form-group">
							<label class="col-sm-2 control-label" for="task">
								Task
							</label>
							<div class="col-sm-6">
								<textarea class="form-control" name="task" placeholder="Enter Task" required></textarea>
							</div>
							<div class="col-sm-4 help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="col-sm-offset-2 checkbox">
								<input type="checkbox" name="important"> Important
							</label>
						</div>

						<div class="form-group">
							<input type="submit" class="col-sm-offset-2 btn btn-primary" value="Add">
						</div>

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@stop