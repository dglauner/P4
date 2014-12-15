<?php

class ResultController extends BaseController
{
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();
			
	}
    public function getAdd()
    {
    	echo 'Post Add';
    }
    public function postAdd()
    {
    	echo 'Post Add';
    }
    
    public function getIndex($id)
    {
        try {
	    	/* Grab my exercise */
	        $exercise = Exercise::with('results')
        	->where('user_id', '=', Auth::id())
        	->findorfail($id);
		}
		catch (Exception $e) {
		
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index/')
				->with('flash_message', 'Exercise id not found; please try again.')
				->withErrors($errorvalue);
		}
		
    	return View::make('result_index')
    		->with('exercise', $exercise);

    }
    public function postIndex()
    {
    	echo 'Post Edit';
    }


}