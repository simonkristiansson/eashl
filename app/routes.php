<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



 /* BASIC */
	Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
	Route::get('login', array('before' => 'guest', 'as' => 'login', 'uses' => 'UserController@login'));
	Route::post('login', array('before' => 'guest', 'as' => 'login.post', 'uses' => 'UserController@loginPost'));
	Route::get('register', array('before' => 'guest', 'as' => 'register', 'uses' => 'UserController@register'));
	Route::post('register', array('before' => 'guest', 'as' => 'register.post', 'uses' => 'UserController@registerPost'));
	Route::get('logout', array('before' => 'auth' ,'as' => 'logout', 'uses' => 'UserController@logout'));

/* SETTINGS */

	Route::get('user/myteam', array('as' => 'user.myteams', 'uses' => 'SettingsController@myTeams'));
	Route::get('user/myplayer', array('as' => 'user.myplayers', 'uses' => 'SettingsController@myPlayers'));

/* FORUM */

	Route::get('forum', array('as' => 'forum', 'uses' => 'ForumController@hello'));
	Route::get('forum/{subid}', array('as' => 'forum.sub', 'uses' => 'ForumController@sub'));
	Route::get('forum/{subid}/new', array('as' => 'forum.thread.new', 'uses' => 'ForumController@threadNew'));
		Route::post('forum/{subid}/new', array('as' => 'forum.thread.new.post', 'uses' => 'ForumController@threadNewPost'));

	Route::get('forum/thread/{id}/{title}', array('as' => 'forum.thread', 'uses' => 'ForumController@thread'));
		Route::post('forum/thread/{id}/{title}', array('as' => 'forum.post.new.post', 'uses' => 'ForumController@postNewPost'));

/* TOURNAMENTS */

	Route::get('tournaments', array('as' => 'tournament', 'uses' => 'TournamentController@index'));
	Route::get('tournaments/create', array('as' => 'tournament.create', 'uses' => 'TournamentController@create'));
		Route::post('tournaments/create', array('as' => 'tournament.create.post', 'uses' => 'TournamentController@createPost'));
	Route::get('tournaments/edit', array('as' => 'tournament.edit', 'uses' => 'TournamentController@edit'));
		Route::post('tournaments/edit', array('as' => 'tournament.edit', 'uses' => 'TournamentController@editPost'));

	

/* TEAMS */

	Route::get('teams', array('as' => 'team', 'uses' => 'TeamController@index'));

/* PLAYERS */

	Route::get('players', array('as' => 'player', 'uses' => 'PlayerController@index'));

/* ADMIN */

	Route::get('admin' , array('as' => 'admin', 'uses' => 'AdminController@admin'));

/* PROFILES */
	
	Route::get('user/{alias}', array('as' => 'user.show', 'uses' => 'UserController@showUser'));



