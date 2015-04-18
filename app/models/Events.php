<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Events extends \Eloquent {
	protected $table = 'events';
	protected $fillable = ['name', 'owner_id', 'start', 'end', 'image', 'detail', 'user_id','event_id'];
	  use SoftDeletingTrait;
	//protected $dates = ['deleted_at'];
}