<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTournaments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournaments', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('image');
			$table->string('console');
			$table->integer('max_teams');
			$table->integer('games');
			$table->integer('max_players');
			$table->integer('hidden');
			$table->date('start_date');
			$table->date('end_date');
			$table->time('default_time');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournaments');
	}

}
