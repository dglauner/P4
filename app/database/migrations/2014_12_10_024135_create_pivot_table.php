<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercise_catagory', function($table) {
		$table->integer('exercise_id')->unsigned();
		$table->integer('catagory_id')->unsigned();
		$table->foreign('exercise_id')->references('id')->on('exercises');
		$table->foreign('catagory_id')->references('id')->on('catagorys');
		}); 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exercise_catagory');
	}

}
