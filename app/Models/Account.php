<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Account extends Model implements AuthenticatableContract, CanResetPasswordContract {

	 use Authenticatable, CanResetPassword, EntrustUserTrait;

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
   /* public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}*/

}
