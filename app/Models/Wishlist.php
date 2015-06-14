<?php  namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model {
	protected $guarded = array();

	
	public static $rules = [
	    "product_code" => "required",
	    "user_id" => "required",
		
	];
	
}
