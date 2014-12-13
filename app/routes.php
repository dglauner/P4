<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/* testing stuff  */

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});


Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});

/*
Route::get('/test', function()
{
    try
    {			
		
		$user = new User;
		$user->email      = 'david.glauner@gmail.com';
		$user->password   = Hash::make('123456');
		$user->save();
		
		$exercise = new Exercise;
		$exercise->desc = 'Pull Ups';
		$exercise->user()->associate($user); # Equivalent of $exercise->user_id = $user->id
		$exercise->save();
		
		$result = new Result;
		$result->exercise()->associate($exercise); 
		$result->work_out_date = '2014-04-04';
		$result->sets = 3;
		$result->reps = 10;
		$result->weight = 80;
		$result->save();
				
		$back = Category::create(array('desc' => 'Back'));
		$exercise->Categorys()->attach($back);
		echo 'Done';
	}
	catch (Exception $e)
	{
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";

	}

		
});
*/

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});


 
 # /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

/* testing stuff  */

Route::get('/', function()
{
	return Redirect::to('/exercise/index');
});

/* User Stuff */
Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');
Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/logout', 'UserController@getLogout');
/* exercise stuff */
Route::group(array('before' => 'auth'), function()
{
	Route::get('/exercise/index', 'ExerciseController@getIndex');
	Route::post('/exercise/index', 'ExerciseController@postIndex');
	Route::get('/exercise/add', 'ExerciseController@getAdd');
	Route::post('/exercise/add', 'ExerciseController@postAdd');
});

