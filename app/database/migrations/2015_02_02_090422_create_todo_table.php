<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("todos", function($table) {
			$table -> increments("id"),
			$table -> text("task"),
			$table -> boolean("important"),
			$table -> boolean("completed"),
			$table -> timestamps()
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("todos");
	}

}
