<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $table = "pages";
    protected $guarded = ["id"];
    protected $softDelete = true;

}
