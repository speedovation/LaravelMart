<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    protected $faker;

    public function getFaker() {
        if (empty($this->faker)) {
            $faker = \Faker\Factory::create();
            $faker->addProvider(new \Faker\Provider\Base($faker));
            $faker->addProvider(new \Faker\Provider\Lorem($faker));
            $faker->addProvider(new \Faker\Provider\en_US\Person($faker));
        }

        return $this->faker = $faker;
    }

    public function run() {

        $this->call("PageTableSeeder");
        $this->call("MenuTableSeeder");
        $this->call("UserTableSeeder");
        $this->call("CategoryTableSeeder");
        $this->call("ProductTableSeeder");
        $this->call("OrderTableSeeder");
    	   $this->call('WishlistsTableSeeder');
        $this->call("OrderItemTableSeeder");
	}

}
