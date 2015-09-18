<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = "blogs";
    protected $guarded = ["id"];
    protected $softDelete = true;
	
	public static $rules = [
	    "title" => "required",
		"url" => "required|unique:menus",
		"status" => "required",
		"visibility" => "required",
		"type" => "required",
		"body" => "required",
		"author" => "required",
		"isCommentsAllowed" => "required",
		"CommentsDays" => "required",
		
	];

}
