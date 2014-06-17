<?php

class Player extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function console()
	{
		return $this->belongsTo('Console');
	}
}
