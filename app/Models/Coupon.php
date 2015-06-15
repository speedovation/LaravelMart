<?php  namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {
    
    public $table = "coupons";
    public $primaryKey = "id";
    public $timestamps = true;
    
    protected $guarded = [];
    
    
    public static $rules = [
    "code" => "required|unique:coupons",
    "type" => "required",
    "amount" => "required",
    "from" => 'required|date_format:"d-m-Y"',
    "to" => 'required|date_format:"d-m-Y"|after:from',
    "can_club" => "required",
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
	
	
	public function  setFromAttribute($date)
    {
    	
		$this->attributes['from'] = \Carbon\Carbon::parse($date); 
    }
	
	public function  setToAttribute($date)
    {
    	
		$this->attributes['to'] = \Carbon\Carbon::parse($date); 

    }
    
}
