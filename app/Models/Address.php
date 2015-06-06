<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;


class Address extends Model {

	protected $table = "addresses";
    protected $guarded = ["id"];
    protected $softDelete = true;

    
    public function address() {
        return $this->belongsTo("App\Models\Account");
    }

}
