<?php

class IndexController extends BaseController {

    protected $layout = "layouts.main";
    
    public function indexAction() {
        $this->layout->content =  View::make("cart.index");
    }

}