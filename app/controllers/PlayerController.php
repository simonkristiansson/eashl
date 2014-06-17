<?php

class PlayerController extends BaseController{

	public function index(){

		$players = Player::all();
		
		return View::make('player/player', compact('players'));
	}
}