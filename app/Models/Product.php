<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

class Product extends Model
{
    
    public $table = "products";
    public $primaryKey = "id";
    public $timestamps = true;

    
	public $fillable = [
	    "code",
		"name",
		"stock",
		"mrp",
		"price",
		"discount",
		"category_id",
		"image",
		"short_desc",
		"long_desc"
	];
    
    public function orders() {
        return $this->belongsToMany("App\Models\Order", "order_item");
    }
    

    public function orderItems() {
        return $this->hasMany("App\Models\OrderItem");
    }

    public function category() {
        return $this->belongsTo("App\Models\Category");
    }
    
    
	 public static $rules = [
	    "code" => "required",
		"name" => "required",
		"stock" => "required",
		"mrp" => "required",
		"price" => "required",
		"discount" => "required",
		"category_id" => "required",
		"image" => "required",
		"short_desc" => "required",
		"long_desc" => "required"
	 ];

}
