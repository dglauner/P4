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
			$table->unique(array('user_id', 'desc'));
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
		DB::statement('TRUNCATE exercises');
		Schema::drop('exercises');

	}

}
