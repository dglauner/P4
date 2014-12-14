<?php
class Helper {
    public static function getErrorMessage(Exception $e) {

        if(str_contains($e->getMessage(), 'Duplicate entry') == true) 
		{
			$message = 'Duplicate entry not allowed';
		}
		elseif(str_contains($e->getMessage(), 'No query results for model') == true)
		{
			$message = 'Id Not Found';
		}
		else
		{
			$message = $e->getMessage();
		}

        return $message;
    }
    
    public static function addCategory($id, $exId)
    {
    	
    	try
    	{
    		$exercise = Exercise::where('user_id', '=', Auth::id())
        		->findorfail($exId);
    		$cat = Category::findorfail($id);
    		if(!$exercise->categories->contains($cat)) 
    		{
				$exercise->Categories()->attach($cat);
			}
    	}
    	catch(Exception $e)
    	{
    		//on error resume next
    	}
    }

	public static function removeCategory($id, $exId)
    {
    	try
    	{
    		$exercise = Exercise::where('user_id', '=', Auth::id())
        		->findorfail($exId);
    		$cat = Category::findorfail($id);
    		if($exercise->categories->contains($cat))
    		{
				$exercise->Categories()->detach($cat);
			}	
    	}
    	catch(Exception $e)
    	{
    		//on error resume next
    	}

    }

}