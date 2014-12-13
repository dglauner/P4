<?php

class CategoryController extends BaseController
{
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();
			
	}
	
	public function getEdit($id)
    {
        
        $exercise = Exercise::with('categories')
        	->where('user_id', '=', Auth::id())
        	->find($id);
        	
   		foreach($exercise->categories as $category)
    	{
    		echo Pre::render($category);
    	}
    	
	    #return View::make('category_edit')
    	#->with('exercise', $exercise);

        	                
    }
    
	public function postEdit()
    {
    	echo 'post edit';
    }
    
    public function getAdd()
    {
        
        $categories = Category::ALL();
        	
   		foreach($categories as $category)
    	{
    		echo Pre::render($category);
    	}
    	
	    #return View::make('category_edit')
    	#->with('exercise', $exercise);

        	                
    }
    
	public function postAdd()
    {
    	echo 'post Add';
    }




}