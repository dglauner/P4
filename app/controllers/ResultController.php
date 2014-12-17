<?php

class ResultController extends BaseController
{
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();
			
	}
    public function getAdd($id)
    {
        try {
	    	/* Grab my exercise */
	        $exercise = Exercise::where('user_id', '=', Auth::id())
        		->findorfail($id);
		}
		catch (Exception $e) {
		
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index/')
				->with('flash_message', 'Exercise not found; please try again.')
				->withErrors($errorvalue);
		}
		
    	return View::make('result_add')
    		->with('exercise', $exercise);

    }
    public function postAdd()
    {
    	# Step 1) Define the rules
		$rules = array(
			'work_out_date' => 'required|date',
			'weight' => 'integer|between:0,500',
			'sets' => 'integer|between:0,200',
			'reps' => 'integer|between:0,200'
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/result/add/'.Input::get('id'))
				->with('flash_message', 'Add failed; Please try again.')
				->withInput()
				->withErrors($validator);
		}

    	try
    	{
	    	/* Grab my exercise */
	        $exercise = Exercise::where('user_id', '=', Auth::id())
        	->findorfail(Input::get('id'));

	    	
	    	$result = new Result;
	    	$result->exercise()->associate($exercise);
	    	$result->work_out_date = date('Y-m-d', strtotime(Input::get('work_out_date')));
	    	$result->weight = Input::get('weight');
			$result->sets = Input::get('sets');
			$result->reps = Input::get('reps');
	    	$result->save();
    	}
		catch (Exception $e) {
		
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/result/index/'.Input::get('id'))
				->with('flash_message', 'Add Failed; please try again.')
				->withErrors($errorvalue);
		}
    	return Redirect::to('/result/index/'.Input::get('id'));

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
				->with('flash_message', 'Exercise not found; please try again.')
				->withErrors($errorvalue);
		}
		
    	return View::make('result_index')
    		->with('exercise', $exercise);

    }
    
    public function getUpdate()
    {
    	$eid = Input::get('eid');
    	$rid = Input::get('rid');

        try {
	    	/* Grab my exercise */
	        $exercise = Exercise::with('results')
        	->where('user_id', '=', Auth::id())
        	->findorfail($eid);
        	
        	foreach($exercise->results as $r)
        	{
        		
        		if($r['id'] == $rid)
        		{
        			$result = $r;
        			//echo Pre::render($result);
        			break;
        		}
        	}
		}
		catch (Exception $e) {
		
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index/')
				->with('flash_message', 'Exercise not found; please try again.')
				->withErrors($errorvalue);
		}
		
    	return View::make('result_update')
    		->with('result', $result)
    		->with('eid', $eid);
    	

    }
    
    public function postUpdate()
    {
    	# Step 1) Define the rules
		$rules = array(
			'work_out_date' => 'required|date',
			'weight' => 'integer|between:0,500',
			'sets' => 'integer|between:0,200',
			'reps' => 'integer|between:0,200'
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/result/update?eid='.Input::get('eid')."&rid=".Input::get('id'))
				->with('flash_message', 'Edit failed; Please try again.')
				->withInput()
				->withErrors($validator);
		}

    	try
    	{
	    	$results = Result::findorfail(Input::get('id'));
	    	$results->work_out_date = date('Y-m-d', strtotime(Input::get('work_out_date')));
	    	$results->weight = Input::get('weight');
			$results->sets = Input::get('sets');
			$results->reps = Input::get('reps');
	    	$results->save();
    	}
		catch (Exception $e) {
		
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index/')
				->with('flash_message', 'Result not found; please try again.')
				->withErrors($errorvalue);
		}

    	return Redirect::to('/result/index/'.Input::get('eid'));
    }


}