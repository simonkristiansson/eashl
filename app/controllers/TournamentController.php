<?php

class TournamentController extends BaseController{

	public function index(){
		$tournaments = Tournament::all();
		return View::make('tournament/tournament', compact('tournaments'));
	}

	public function create(){

		$consoles = Console::all();

		foreach($consoles as $console){
			$console_list[$console->id] = $console->name;
		}

		return View::make('tournament/create', compact('console_list'));
	}

	public function createPost(){

		Input::flash();


		$attributes = array(	
			'name' => Input::get('name'),
			'image' => Input::file('image'),
			'console' => Input::get('console'),
			'start_date' => Input::get('start_date'),
			'end_date' => Input::get('end_date'),
			'default_time' => Input::get('default_time'),
			'max_players' => Input::get('max_players'),
			'games' => Input::get('games'),
		);

		$rules = array(
	    	'name' => 'required|unique:tournaments,name',
	    	'image' => 'required',
	    	'console' => 'required',
	    	'start_date' => 'required|date',
	    	'end_date' => 'required|date',
	    	'default_time' => 'required|regex:'^'([01]?[0-9]|2[0-3]):[0-5][0-9]'^'',
	    	'max_players' => 'required|numeric',
	    	'games' => 'required|numeric'

		);

		$messages = array(
			'name.required' => 'You must enter a name for your tournament, dumbass!',

		);


		$validator = Validator::make($attributes, $rules, $messages);

 		if($validator->fails()){
			   
			return Redirect::route('tournament.create')->withErrors($validator);
		} else {

			$file = Input::file('image');
			$destinationPath = 'public/images/tournament/';
			$filename = str_random(16).'.'.$file->getClientOriginalExtension();
			//$extension =$file->getClientOriginalExtension(); 
			Input::file('image')->move($destinationPath, $filename);

				$tournament = new Tournament;
					$tournament->name = Input::get('name');
					$tournament->image = $filename;
					$tournament->console = Input::get('console');
					$tournament->start_date = Input::get('start_date');
					$tournament->end_date = Input::get('end_date');
					$tournament->default_time = Input::get('default_time');
					$tournament->max_players = Input::get('max_players');
					$tournament->games = Input::get('games');
				$tournament->save();
			return Input::all();
		}


		

	}
}