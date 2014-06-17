<?php

class Forum extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
}

class ForumCategory extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function subs()
    {
        return $this->hasMany('ForumSub');
    }
}

class ForumSub extends Eloquent {
	protected $guarded = array();
	public static $rules = array();

	public function threads()
    {
        return $this->hasMany('ForumThread')->orderBy('updated_at', 'DESC');
    }

}

class ForumThread extends Eloquent {
	protected $guarded = array();
	public static $rules = array();

	public function posts()
    {
        return $this->hasMany('ForumPost');
    }
}

class ForumPost extends Eloquent {
	protected $guarded = array();
	public static $rules = array();
}



