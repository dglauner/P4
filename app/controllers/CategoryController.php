<?php

class CategoryController extends BaseController
{
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();
			
	}
	
	public function getEdit($id)
    {
        /* Grab my exercise categories */
        try
        {
        $exercise = Exercise::with('categories')
        	->where('user_id', '=', Auth::id())
        	->find($id);
        }
    	catch (Exception $e)
    	{
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index')
				->with('flash_message', 'Failed; please try again.')
				->withErrors($errorvalue);

    	}
        /* Grab all categories */	
        $collection = Category::all();
        /* Make Associative Array */
        $cats = array();
        foreach($collection as $category)	
        {
        	$arr = array();
        	$arr['id'] = $category['id'];
        	$arr['desc'] = $category['desc'];
			$arr['checked'] = '';
			$temp = $category['id'];
			settype($temp, "string");
			$cats[$temp] = $arr;
        	
        }	
        /* Set Checked to true for existing categories */
        foreach($exercise->categories as $category)
        {
        	$temp = $category['id'];
			settype($temp, "string");
			$cats[$temp]['checked'] = "checked='checked'";

        }
        	    	
	    return View::make('category_edit')
    		->with('categories', $cats)
    		->with('exercise', $exercise);
    	
    }
    
	public function postEdit()
    {
		$cats = array();
		$cats = Input::get('cats');
		$exId = Input::get('exId');
		$collection = Category::all();

		foreach($collection as $category)
    	{
    		if(in_array($category['id'], $cats)) 
    		{
                Helper::addCategory($category['id'], $exId);

			}  
			else
			{
				Helper::removeCategory($category['id'], $exId);
			}          
    	}
    	
		return Redirect::to('/exercise/index');

    }
    
    public function getAdd()
    {
        $categories = Category::ALL();    	
	    return View::make('category_add')
    	->with('categories', $categories);
  	                
    }
    
	public function postAdd()
    {
    	# Step 1) Define the rules
		$rules = array(
			'desc' => 'required'
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/category/add')
				->with('flash_message', 'Add failed; Please try again.')
				->withInput()
				->withErrors($validator);
		}

    	$category = new Category;
		$category->desc = Input::get('desc');
		try
		{
			$category->save();
		}
    	catch (Exception $e)
    	{
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/category/add')
				->with('flash_message', 'Add failed; please try again.')
				->withErrors($errorvalue);

    	}

		return Redirect::to('/category/add');
    }
    
    public function getDelete($id)
    {
    	try
    	{
    		Category::destroy($id);
    		return Redirect::to('/category/add');
    	}
    	catch (Exception $e)
    	{
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/category/add')
				->with('flash_message', 'Delete failed; please try again.')
				->withErrors($errorvalue);

    	}
    }

    public function getUpdate($id)
    {
  	    try
        {
        	$category = Category::findorfail($id);   
        }
    	catch (Exception $e)
    	{
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index')
				->with('flash_message', 'Update failed; please try again.')
				->withErrors($errorvalue);

    	}
	
	    return View::make('category_update')
    	->with('category', $category);

    }
    
	public function postUpdate()
    {
        try
        {
        	$id = Input::get('id');
        	$category = Category::findorfail($id);  
        	$category->desc = Input::get('desc');
			$category->save();

        }
    	catch (Exception $e)
    	{
			$errorvalue = Helper::getErrorMessage($e);

			return Redirect::to('/exercise/index')
				->with('flash_message', 'Update failed; please try again.')
				->withInput()
				->withErrors($errorvalue);

    	}
	
	    return Redirect::to('/category/add');

	}



}