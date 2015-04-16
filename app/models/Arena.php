<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Arena extends Eloquent {
	use SoftDeletingTrait;

	protected $table = 'arenas';

	protected $fillable = ['name','address','phone','user_id','about'];

	public function owner(){
		return $this->belongsTo("User", "user_id", "id");
	}

	public function reviews(){
		return $this->hasMany("Review");
	}

	public function schedular(){
		return $this->hasMany("Schedule", "admin_id", "user_id");
	}

}