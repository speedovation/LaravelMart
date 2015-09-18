<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $table = "pages";
    protected $guarded = ["id"];
    protected $softDelete = true;
	
	public static $rules = [
	    "title" => "required",
		"url" => "required|unique:pages",
		"status" => "required",
		"visibility" => "required",
		"type" => "required",
		"body" => "required"
	];

}
