<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Email extends Model {

    protected $table = "emails";
    protected $guarded = ["id"];
    protected $softDelete = true;

    
    public static $rules = [
	    "key" => "required|unique:emails",
	    "value" => "required",
		
	];

}
