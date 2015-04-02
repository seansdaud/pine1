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
			$table->integer('owner_id')->unsigned();
			$table -> foreign('owner_id')->references('id')->on('users');
			$table->dateTime('start');
			$table->dateTime("end");
			$table->text("image");
			$table->text("detail");
			$table->integer('user_id')->unsigned();
			$table -> foreign('user_id')->references('id')->on('users');
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
		Schema::drop('events');
	}

}
