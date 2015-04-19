<?php

class Schedule extends \Eloquent {
	protected $fillable = ["start_time", "end_time", "time_diff", "admin_id", "day", "price", "book_status", "booking"];
}