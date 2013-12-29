<?php

class ProductController extends BaseController {
    
    protected $layout = "layouts.main";

    public function indexAction() {
        //eager loading
        //http://laravel.com/docs/eloquent
        $products = Product::with('category');
        
        
        $category = Input::get("category");

        if ($category) {
            $products->where("category_id", $category);
        }

        $this->layout->content = View::make('products.index', ['products' => $products->paginate(12)] );
    }
    
    
    public function nextAction() {
        //eager loading
        //http://laravel.com/docs/eloquent
        $products = Product::with('category');
        
        $category = Input::get("page_no");

        if ($category) {
            $products->where("category_id", $category);
        }

        $this->layout->content = View::make('products.index', ['products' => $products->get()] );
    }

}