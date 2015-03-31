<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("events", function($table){
			$table->increments("id");
			$table->text("name");
			$table->integer('arena_id')->unsigned();
			$table->foreign("arena_id")->references("id")->on("arenas");
			$table->dateTime('start');
			$table->dateTime("end");
			$table->text("image");
			$table->text("detail");
			$table->integer('user_id')->unsigned();
			$table->foreign("user_id")->references("id")->on("users");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
