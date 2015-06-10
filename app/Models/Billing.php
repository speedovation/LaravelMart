<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    
	public $table = "billings";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "salutation",
		"first_name",
		"last_name",
		"account_id",
		"company",
		"city",
		"state",
		"zip",
		"address"
	];

	public static $rules = [
	    "first_name" => "required",
		"last_name" => "required",
		"city" => "required",
		"state" => "required",
		"zip" => "required",
		"address" => "required"
	];

}
