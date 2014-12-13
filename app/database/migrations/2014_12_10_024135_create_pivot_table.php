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
		Schema::create('category_exercise', function($table) {
		$table->integer('exercise_id')->unsigned();
		$table->integer('category_id')->unsigned();
		$table->foreign('exercise_id')->references('id')->on('exercises');
		$table->foreign('category_id')->references('id')->on('categories');
		$table->unique(array('exercise_id', 'category_id'));
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
		DB::statement('TRUNCATE category_exercise');
		Schema::drop('category_exercise');
	}

}
