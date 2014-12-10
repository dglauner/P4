<?php

class UserController extends BaseController {


    public function __construct() {
        
        parent::__construct();
        
	    $this->beforeFilter('guest',
		array('only' => array('getLogin','getSignup')));
		
    }

    public function getSignup() {
    
		return View::make('signup');

    }

    public function postSignup() {
		
		# Step 1) Define the rules
		$rules = array(
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);

		# Step 2)
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$user = new User;
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please try again.')
				->withInput();
		}

		# Log in
		Auth::login($user);

		return Redirect::to('/main')->with('flash_message', 'Welcome to Fitness Tracker!');
		

    }

    public function getLogin() {
    
		return View::make('login');

    }
    

    public function postLogin() {
    
    
    
		$credentials = Input::only('email', 'password');

		# Note we don't have to hash the password before attempting to auth - Auth::attempt will take care of that for us
		if (Auth::attempt($credentials, $remember = false)) {
			return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput();
		}

    }
    
    
    public function getLogout(){
        # Log out
	    Auth::logout();
	
	    # Send them to the homepage
	    return Redirect::to('/');

    }


}