<?php

class TeamController extends BaseController{

	public function index(){

		$teams = Team::orderBy('name', 'ASC')->get();
		return View::make('team/team', compact('teams'));
	}
}