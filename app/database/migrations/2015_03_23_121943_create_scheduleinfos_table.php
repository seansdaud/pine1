<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleinfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scheduleinfos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('start_time');
			$table->string('end_time');
			$table->integer('booking_id');
			$table->integer('day');
			$table->integer('price');
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
		Schema::drop('scheduleinfos');
	}

}
