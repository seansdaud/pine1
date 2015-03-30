<?php

class Arena extends Eloquent {
	protected $table = 'arenas';
	protected $fillable = [];

	public function owner(){
		return $this->belongsTo("User");
	}
}