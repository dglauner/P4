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
			$table->foreign('exercise_id')->references('id')->on('exercises'); 
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('results');
	}

}
