<?php

class Review extends \Eloquent {
	protected $fillable = ['user_id', 'review', 'arena_id'];
}