<?php

namespace App\Libraries\Repositories;


use App\Models\Billing;
use Illuminate\Support\Facades\Schema;

class BillingRepository
{

	/**
	 * Returns all Billings
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Billing::all();
	}

	public function search($input)
    {
        $query = Billing::query();

        $columns = Schema::getColumnListing('billings');
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
	 * Stores Billing into database
	 *
	 * @param array $input
	 *
	 * @return Billing
	 */
	public function store($input)
	{
		return Billing::create($input);
	}

	/**
	 * Find Billing by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Billing
	 */
	public function findBillingById($id)
	{
		return Billing::find($id);
	}

	/**
	 * Updates Billing into database
	 *
	 * @param Billing $billing
	 * @param array $input
	 *
	 * @return Billing
	 */
	public function update($billing, $input)
	{
		$billing->fill($input);
		$billing->save();

		return $billing;
	}
}
