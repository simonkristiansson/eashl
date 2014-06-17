<?php

Class SettingsController extends BaseController{
	

	public function myPlayers(){

		$has_players = Player::where('user_id', '=', Sentry::getUser()->id)->count();

		if($has_players){

			return View::make('settings/myplayers');
		} else {
			
			return View::make('settings/createplayer')->with('first_player', 'Please create your player profile!');
		}

		//return View::make('settings/myplayers');
	}

	public function myTeams(){

		return View::make('settings/myteams');
	}

}