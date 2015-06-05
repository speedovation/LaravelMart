<?php namespace App\Http\Controllers;

class IndexController extends CoreController {

    protected $layout = "layouts.main";
    
    public function indexAction() {
        $this->layout->content =  view("cart.index");
    }

}
