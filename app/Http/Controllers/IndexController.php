<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;


class IndexController extends CoreController {

    
    public function indexAction() {
        return view("home.index");
    }
    
    public function getKg() {
        return view("kg.index");
    }

    public function getCategories() {
        
        $categories = Category::whereNull('parent_id')
                ->orderBy('created_at', 'desc')
                ->get();
		
		   return view('kg.categories')->with( ['categories'=>$categories, 'title' => 'All Categories']);
        
    }

}
