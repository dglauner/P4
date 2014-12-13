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
    
    public function getAdd()
    {
    	return View::make('exercise_add');
    }
    
    public function postAdd()
    {
    	# Step 1) Define the rules
		$rules = array(
			'title' => 'required'
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/exercise/add')
				->with('flash_message', 'Add failed; please try again.')
				->withInput()
				->withErrors($validator);
		}

    	
    	
    	$exercise = new Exercise;
		$exercise->desc = Input::get('title');
		$exercise->user()->associate(Auth::user()); 
		
		try {
			$exercise->save();
		}
		catch (Exception $e) {
			
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index')
				->with('flash_message', 'Add failed; please try again.')
				->withInput()
				->withErrors($errorvalue);
		}

		
		return Redirect::to('/exercise/index');

    }

}