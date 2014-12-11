<?php

class ExerciseController extends BaseController
{
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

	}
    
    public function getIndex()
    {
        
        $exercises = Exercise::with('categories')
        	->where('user_id', '=', Auth::id())
        	->get();
                
        return View::make('exercise_index')
        	->with('exercises', $exercises);
    }

    public function postIndex()
    {
        //return View::make('single');
    }
}