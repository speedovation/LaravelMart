<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller {

    public function indexAction() {
        return Category::with(["products"])->get();
    }

    public function getListAction() {
        return Category::select( ['id', \DB::raw('name as text') ] )->get();
    }
    
    

}
