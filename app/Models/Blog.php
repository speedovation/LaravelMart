<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
	
	use \Conner\Tagging\Taggable;

    protected $table = "blogs";
    protected $guarded = ["id"];
    protected $softDelete = true;
	
	public static $rules = [
	    "title" => "required",
		"url" => "required|unique:blogs",
		"sourceurl" => "required|unique:blogs",
		"status" => "required",
		"visibility" => "required",
		"type" => "required",
		"body" => "required",
		
		"category_id" => "required",
		"author" => "required",
		"is_comments_allowed" => "required",
		"comments_days" => "required",
		
	];

}
