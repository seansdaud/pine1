<?php

class Arena extends Eloquent {
	protected $table = 'arenas';

	protected $fillable = ['name','address','phone','user_id','about'];

	public function owner(){
		return $this->belongsTo("User", "user_id", "id")->withTrashed();
	}

	public function reviews(){
		return $this->hasMany("Review");
	}
}