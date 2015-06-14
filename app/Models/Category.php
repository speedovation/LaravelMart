<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model {

    protected $table = "categories";
    protected $guarded = ["id"];
    protected $softDelete = true;

    public function products() {
        return $this->hasMany("Product");
    }
    
    public static $rules = [
	    "name" => "required",
		
	];

}
