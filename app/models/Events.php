<?php

class Events extends \Eloquent {
	protected $table = 'events';
	protected $fillable = ['name', 'owner_id', 'start', 'end', 'image', 'detail', 'user_id'];

}