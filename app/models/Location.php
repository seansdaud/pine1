<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Location extends Eloquent {
	protected $fillable = ['zone','district','city'];
}