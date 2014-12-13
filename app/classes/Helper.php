<?php
class Helper {
    public static function getErrorMessage(Exception $e) {

        if(str_contains($e->getMessage(), 'Duplicate entry') == true) 
		{
			$message = 'Duplicate entry not allowed';
		}
		else
		{
			$message = $e->getMessage();
		}

        return $message;
    }
}