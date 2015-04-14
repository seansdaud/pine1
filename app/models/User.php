<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	protected $fillable = array('email', 'username', 'password', 'password_temp', 'code', 'active', 'usertype', 'name', 'deleted', 'address', 'contact');

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

	public function arena(){
		return $this->hasOne("Arena", "id", "user_id");
	}

	function marker(){
		return $this->hasOne('Marker');
	}

	public function events(){
		return $this->hasMany("Events");
	}

	public function bookings(){
		return $this->hasMany("Booking");
	}

}
