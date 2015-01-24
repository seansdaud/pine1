<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("users", function($table) {
			$table -> increments('id');
			$table -> string('name', 50);
			$table -> string('email', 100);
			$table -> string('username', 100);
			$table -> text('password');
			$table -> text('password_temp');
			$table -> text('code');
			$table -> integer('usertype');
			$table -> string('remember_token') -> nullable();

			$table -> integer('active');

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
		Schema::drop("users");
	}

}
