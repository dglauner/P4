<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function($table) {
		
		    $table->increments('id');
		    $table->integer('exercise_id')->unsigned();
		    $table->date('work_out_date');
		    $table->tinyInteger('sets');
		    $table->tinyInteger('reps');
			$table->Integer('weight');
		    $table->timestamps();
			$table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade'); 
			$table->unique(array('exercise_id', 'work_out_date'));
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
		DB::statement('TRUNCATE results');
		Schema::drop('results');
	}

}
