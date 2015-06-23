<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Permission_role extends Model {

    protected $table = "permission_role";
    protected $guarded = ["id"];
    protected $softDelete = true;

    
    public static $rules = [
		"role_id" => "required",
		"permission_id" => "required",
	];

}
