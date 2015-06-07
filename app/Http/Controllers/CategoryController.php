<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CategoryController extends Controller {

    public function indexAction() {
        return Category::with(["products"])->get();
    }

}
