<?php
 
class FitnessTrackerTableSeeder extends Seeder {
 
  public function run()
  {		
		
		$user = new User;
		$user->email      = 'david.glauner@gmail.com';
		$user->password   = Hash::make('123456');
		$user->save();
		
		$exercise = new Exercise;
		$exercise->desc = 'Pull Ups';
		$exercise->user()->associate($user); # Equivalent of $exercise->user_id = $user->id
		$exercise->save();
		
		$result = new Result;
		$result->exercise()->associate($exercise); 
		$result->work_out_date = '2014-04-04';
		$result->sets = 3;
		$result->reps = 10;
		$result->weight = 80;
		$result->save();
				
		$back = Category::create(array('desc' => 'Back'));
		$exercise->Categories()->attach($back);
		
		$back = Category::create(array('desc' => 'Chest'));


		$back = Category::create(array('desc' => 'Shoulders'));
		$exercise->Categories()->attach($back);

		$back = Category::create(array('desc' => 'Arms'));
		
		$back = Category::create(array('desc' => 'Legs'));



  }
 
}