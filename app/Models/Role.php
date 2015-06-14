<?php namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	 public $table = "roles";
    public $primaryKey = "id";
    public $timestamps = true;
	
	protected $guarded = [];

    
	public static $rules = [
	    "name" => "required",
		"display_name" => "required",
		"description" => "required",
	];
}
