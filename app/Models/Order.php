<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as Model;

class Order extends Model {

    protected $table = "orders";
    protected $guarded = ["id"];
    protected $softDelete = true;

    public function account() {
        return $this->belongsTo("User");
    }

    public function orderItems() {
        return $this->hasMany("OrderItem");
    }

    public function products() {
        return $this->belongsToMany("Product", "order_item");
    }

    public function getTotalAttribute() {
        $total = 0;

        foreach ($this->orderItems as $orderItem) {
            $total += $orderItem->price * $orderItem->quantity;
        }

        return $total;
    }

}
