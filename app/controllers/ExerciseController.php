<?php

class ExerciseController extends BaseController
{
	public function __construct() {

		parent::__construct();
			
	}
    
    public function getIndex()
    {
        
        $exercises = Exercise::with('categories','results')
        	->where('user_id', '=', Auth::id())
        	->get();
                
        return View::make('exercise_index')
        	->with('exercises', $exercises);
    }
    
    public function getAdd()
    {
    	return View::make('exercise_add');
    }
    
    public function postAdd()
    {

		$rules = array('title' => 'required');

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) 
		{
			return Redirect::to('/exercise/add')
				->with('flash_message', 'Add failed; please try again.')
				->withInput()
				->withErrors($validator);
		}
    	
    	$exercise = new Exercise;
		$exercise->desc = filter_var(Input::get('title'), FILTER_SANITIZE_STRING);
		$exercise->user()->associate(Auth::user()); 
		
		try 
		{
			$exercise->save();
		}
		catch (Exception $e) 
		{
			
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index')
				->with('flash_message', 'Add failed; please try again.')
				->withInput()
				->withErrors($errorvalue);
		}
		
		return Redirect::to('/exercise/index');

    }
    
    public function getEdit($id)
    {
       try
       { 
       		$exercise = Exercise::where('user_id', '=', Auth::id())
        	->findorfail($id);
       }
       catch(Exception $e)
       {
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index')
				->with('flash_message', 'Edit Failed...')
				->withErrors($errorvalue);
       }
        
        return View::make('exercise_edit')
        	->with('exercise', $exercise);
      
    }

    public function postEdit()
    {
    	try 
    	{
			$rules = array(
				'desc' => 'required');
	
			$validator = Validator::make(Input::all(), $rules);
	
			if($validator->fails()) 
			{
				return Redirect::to('/exercise/Edit')
					->with('flash_message', 'Edit failed; Please try again.')
					->withInput()
					->withErrors($validator);
			}
	
		    $exercise = Exercise::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) 
	    {
	        $errorvalue = Helper::getErrorMessage($e);

	        return Redirect::to('/exercise/index')
				->with('flash_message', 'Edit failed; Exercise not found!')
				->withInput()
				->withErrors($errorvalue);

	    }    	
	    
		$exercise->desc = filter_var(Input::get('desc'), FILTER_SANITIZE_STRING);
		
		try 
		{
			$exercise->save();
		}
		catch (Exception $e) 
		{
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/edit/'.Input::get('id'))
				->with('flash_message', 'Edit failed; please try again.')
				->withErrors($errorvalue);

		}

		return Redirect::to('/exercise/index');

    }

    public function postDelete()
    {
    	/* Ajax Delete */
    	if(Request::ajax()) 
    	{
    		$eid  = Input::get('eid');
    		try
    		{
	       		$exercise = Exercise::where('user_id', '=', Auth::id())
	        	->findorfail($eid);
	        	
	        	$exercise->delete();
	        	
	        	return Response::json(array('success' => true), 200);

			}
			catch(Exception $e)
			{
				$errorvalue = Helper::getErrorMessage($e);
				
				return Response::json(array(
		        'success' => false,
		        'errors' => $errorvalue
		    	), 400); 
		    		
	    	}
	    	

		}
    		
    		
    		
    }

    

}