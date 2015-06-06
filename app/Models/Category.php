<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as Model;

class Category extends Model {

    protected $table = "category";
    protected $guarded = ["id"];
    protected $softDelete = true;

    public function products() {
        return $this->hasMany("Product");
    }

}
