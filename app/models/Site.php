<?php

class Site extends Eloquent {
	protected $guarded = array();

	public static $rules = array();



	public static function name(){

		$name = "EASHL";
		return $name;
	}


	public static function timeAgo($date,$granularity=1) {
		$retval = '';
	    $date = strtotime($date);
	    $difference = time() - $date;
	    $periods = array('decade' => 315360000,
	        'year' => 31536000,
	        'month' => 2628000,
	        'week' => 604800, 
	        'day' => 86400,
	        'hour' => 3600,
	        'minute' => 60,
	        'second' => 1);
 	    if ($difference > 86400 ) { // less than 5 seconds ago, let's say "just now"
       		$retval = date('Y-m-d H:i', $date);
        	return $retval;
    	} elseif($difference < 5) {
    		return "just now";
    	} else {               
	        foreach ($periods as $key => $value) {
	            if ($difference >= $value) {
	                $time = floor($difference/$value);
	                $difference %= $value;
	                $retval .= ($retval ? ' ' : '').$time.' ';
	                $retval .= (($time > 1) ? $key.'s' : $key);
	                $granularity--;
	            }
	            if ($granularity == '0') { break; }
	        }
	        return $retval.' ago';      
	    }
	}

}