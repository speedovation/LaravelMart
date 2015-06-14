<?php namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	protected $guarded = [];
	
	public static $rules = [
	    "name" => "required",
		"display_name" => "required",
		"description" => "required",
	];
}
