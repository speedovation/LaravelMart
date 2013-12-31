<?php

class ProductsController extends BaseController {
    
    protected $layout = "layouts.main";

    public function getIndex() {
        //eager loading
        //http://laravel.com/docs/eloquent
        $products = Product::with('category');
        
        
        $category = Input::get("category");

        if ($category) {
            $products->where("category_id", $category);
        }

        $this->layout->content = View::make('products.index', ['products' => $products->paginate(12)] );
    }
    
    
    public function getProduct() {
        //eager loading
        //http://laravel.com/docs/eloquent
        $products = Product::with('category');
        //$products->where("category_id", $category);
        
        //$id = Input::get("id");
        $products->where("id",  Request::segment(3));
        

        $this->layout->content = View::make('products.product', [ 'product' => $products->firstOrFail() ] );
        
    }
    
      public function getListproducts() {
        //eager loading
        //http://laravel.com/docs/eloquent
        $products = Product::with('category');
        
        
        $category = Input::get("category");

        if ($category) {
            $products->where("category_id", $category);
        }

        return Response::json($products->paginate(12));
    }

}