<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArenasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arenas', function($table)
		{
			$table -> increments('id');
			$table -> string("name", 255);
			$table -> string("address", 255);
			$table -> string("phone", 15);
			$table -> text("about");
			$table -> integer("owner_id")->unsigned();
			$table -> foreign('owner_id')->references('id')->on('users')->onDelete("cascade");
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arenas');
	}

}
