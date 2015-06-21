<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model {

    protected $table = "orderitems";
    protected $guarded = ["id"];
    protected $softDelete = true;

   
    
    public static $rules = [
	    "name" => "required",
		
	];

}
