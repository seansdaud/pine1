<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Arena extends Eloquent {
	use SoftDeletingTrait;

	protected $table = 'arenas';

	protected $fillable = ['name','address','phone','user_id','about'];

	public function owner(){
		return $this->belongsTo("User", "user_id", "id")->withTrashed();
	}

	public function reviews(){
		return $this->hasMany("Review");
	}
}