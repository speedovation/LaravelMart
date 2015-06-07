<?php

namespace App\Libraries\Repositories;


use App\Models\Product;
use Illuminate\Support\Facades\Schema;

class ProductRepository
{

	/**
	 * Returns all Products
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Product::all();
	}

	public function search($input)
    {
        $query = Product::query();

        $columns = Schema::getColumnListing('products');
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
	public function store($input)
	{
		return Product::create($input);
	}

	/**
	 * Find Product by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Product
	 */
	public function findProductById($id)
	{
		return Product::find($id);
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
