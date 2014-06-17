<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('players', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('console');
			$table->string('alias');
			$table->integer('team_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('number');
			$table->integer('c');
			$table->integer('lw');
			$table->integer('rw');
			$table->integer('ld');
			$table->integer('rd');
			$table->integer('g');
			$table->softDeletes();
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
		Schema::drop('players');
	}

}
