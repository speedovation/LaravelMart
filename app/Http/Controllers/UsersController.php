<?php namespace App\Http\Controllers;


class UsersController extends CoreController {

	protected $layout = "layouts.main";

	public function __construct() {
		$this->middleware('csrf', array('on'=>'post'));
		$this->middleware('auth', array('only'=>array('getDashboard')));
	}

	public function getRegister() {
		$this->layout->content = View::make('users.register');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Account::$rules);

		if ($validator->passes()) {
			$user = new Account;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('users/login')->with('message', 'Thanks for registering!');
		} else {
			return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
		if(!Auth::check())
            $this->layout->content = View::make('users.login');
        else
            return Redirect::to('users/dashboard');
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('users/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}

	public function getDashboard() {
		$this->layout->content = View::make('users.dashboard');
	}
    
    public function getProfile() {
        $this->layout->content = View::make("users.profile");
    }

	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
}
