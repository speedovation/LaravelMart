<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Role_user extends Model {

    protected $table = "role_user";
    protected $guarded = ["id"];
    protected $softDelete = true;

    
    public static $rules = [
		
	];

}
