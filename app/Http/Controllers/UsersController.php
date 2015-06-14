<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UsersController extends CoreController {

	public function __construct() {
/*		$this->middleware('csrf', array('on'=>'post'));*/
		$this->middleware('auth');
	}
	
	public function getDashboard() {
		return view('users.dashboard');
	}
    
    public function getProfile() {
        return view("users.profile");
    }


}


/*

TO BE removed soon even from comment

public function getRegister() {
		return view('users.register');
	}


	public function postCreate() {
		$validator = \Validator::make(\Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;

			$user->email = \Input::get('email');
			$user->password = \Hash::make(\Input::get('password'));
			$user->save();

			return \Redirect::to('users/login')->with('message', 'Thanks for registering!');
		} else {
			return \Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
		if(!\Auth::check())
            return view('users.login');
        else
            return \Redirect::to('users/dashboard');
	}

	public function postSignin() {
		if (\Auth::attempt(array('email'=>\Input::get('email'), 'password'=>\Input::get('password')))) {
			return \Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
		} else {
			return \Redirect::to('users/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}
	
		public function getLogout() {
		\Auth::logout();
		return \Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
	
	public function getForget() {
		return view('users.reset');
	}
	
	public function postForget() {
		return view('users.register');
	}

*/
