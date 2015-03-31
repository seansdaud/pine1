<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	protected $fillable = array('email', 'username', 'password', 'password_temp', 'code', 'active', 'usertype', 'name', 'deleted');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $dates = ['deleted_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password', 'remember_token');

	public function arenas(){
		return $this->hasMany("Arena");
	}
	function marker(){
		return $this->hasOne('Marker');

	}
	public function eventManager(){
		return $this->hasMany("Events");
	}

}
