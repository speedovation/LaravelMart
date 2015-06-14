<?php  namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {
    
    public $table = "coupons";
    public $primaryKey = "id";
    public $timestamps = true;
    
    protected $guarded = [];
    
    
    public static $rules = [
    "code" => "required",
    "type" => "required",
    "amount" => "required",
    "from" => 'required|date_format:"d-m-Y"',
    "to" => "required|date|after:from",
    "can_club" => "require",
    "usage" => "required",
		/*"order_minimum" => "required",
		"order_maximum" => "required",
		"products_included" => "required",
		"products_excluded" => "required",
		"categories_included" => "required",
		"categories_excluded" => "required",
		"payment_methods" => "required",
    "usage" => "required",*/
    
    
    ];
}
