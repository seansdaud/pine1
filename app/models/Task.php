<?php 

class Task extends Eloquent {
	protected $fillable = array("task", "completed", "important");
}