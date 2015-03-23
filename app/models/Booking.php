<?php

class Booking extends \Eloquent {
	protected $fillable = [];
	function scheduleinfo(){
		return $this->hasOne('Scheduleinfo');
	}
}