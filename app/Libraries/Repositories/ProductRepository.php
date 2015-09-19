<?php

namespace App\Libraries\Repositories;

use Illuminate\Support\Facades\Schema;

class ProductRepository
{
    
	/**
	 * Returns all Products
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
    */
    public function all($table)
    {
        $Model = "\\App\\Models\\".ucfirst(str_singular($table));
        return $Model::all();
    }
    
    public function search($input,$table)
    {
        
        $Model = "\\App\\Models\\".ucfirst(str_singular($table));
        
        /*        echo $Model. "SSSS";*/
        
        $query = $Model::query();
        
        $columns = Schema::getColumnListing($table);
        $attributes = array();
        
        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
                }else{
                $attributes[$attribute] =  null;
            }
        };
        
        return [$query->get(), $attributes];
        
    }
    
	/**
	 * Stores Product into database
	 *
	 * @param array $input
	 *
	 * @return Product
    */
    public function store($input,$table)
    {
        
        $Model = "\\App\\Models\\".ucfirst(str_singular($table));
        
        return $Model::create($input);
    }
    
	/**
	 * Find Product by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Product
    */
    public function findProductById($id, $table)
    {
        $Model = "\\App\\Models\\".ucfirst(str_singular($table));
        
        return $Model::find($id);
    }
    
	/**
	 * Updates Product into database
	 *
	 * @param Product $product
	 * @param array $input
	 *
	 * @return Product
    */
    public function update($product, $input)
    {
        $product->fill($input);
        $product->save();
        
        return $product;
    }
}
