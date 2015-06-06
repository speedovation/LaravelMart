<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

class Product extends Model {

    protected $table = "product";
    protected $guarded = ["id"];
    protected $softDelete = true;

    public function orders() {
        return $this->belongsToMany("App\Models\Order", "order_item");
    }

    public function orderItems() {
        return $this->hasMany("App\Models\OrderItem");
    }

    public function category() {
        return $this->belongsTo("App\Models\Category");
    }

}
