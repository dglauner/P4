<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercises', function($table) {
		
		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->string('desc');
		    $table->timestamps();
			$table->foreign('user_id')->references('id')->on('users'); 
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exercises');

	}

}
