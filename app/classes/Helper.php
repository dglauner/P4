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
}