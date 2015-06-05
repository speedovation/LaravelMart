<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends CoreController {

    protected $layout = "layouts.main";
    
    public function indexAction() {
        $this->layout->content =  view("cart.index");
    }

}
