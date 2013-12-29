<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Account extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = "account";
    protected $hidden = ["password"];
    protected $guarded = ["id"];
    protected $softDelete = true;
    
    
    public static $rules = array(
		#'firstname'=>'required|alpha|min:2',
		#'lastname'=>'required|alpha|min:2',
		'email'=>'required|email|unique:account',
		'password'=>'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,12'
	);

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function getReminderEmail() {
        return $this->email;
    }

    public function orders() {
        return $this->hasMany("Order");
    }

}