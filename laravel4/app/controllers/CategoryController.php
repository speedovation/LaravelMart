<?php  namespace App\Http\Controllers;

class CategoryController extends CoreController {

    public function indexAction() {
        return Category::with(["products"])->get();
    }

}
