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
		

		$rules = array(
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		);

		$validator = Validator::make(Input::all(), $rules);


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

		return Redirect::to('/exercise/index')->with('flash_message', 'Welcome to Fitness Tracker!');
		

    }

    public function getLogin() {
    
		return View::make('login');

    }
    

    public function postLogin() {
    
		$rules = array(
			'email' => 'required|email',
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/login')
				->with('flash_message', 'Login failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}
    
		$credentials = Input::only('email', 'password');

		if (Auth::attempt($credentials, $remember = true)) {
			return Redirect::intended('/exercise/index')->with('flash_message', 'Welcome Back!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput();
		}

    }
    
    
    public function getLogout(){

	    Auth::logout();
	

	    return Redirect::to('/');

    }


}