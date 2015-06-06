<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends CoreController {

    
    public function indexAction() {
        return view("home.index");
    }

}
