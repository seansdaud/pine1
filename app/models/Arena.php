<?php

class Arena extends Eloquent {
	protected $table = 'arenas';
	protected $fillable = ['name','address','phone','user_id','about'];

}