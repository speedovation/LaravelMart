<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;


//Using both versions old seeders style and FactoryModel also
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
        
        Model::unguard();
        
        factory(App\Models\User::class,10)->create();
        factory(App\Models\Category::class,5)->create();
        
        Model::reguard();
        
        $this->call("SettingTableSeeder");
        $this->call("EmailTableSeeder");
        $this->call("PageTableSeeder");
        $this->call("MenuTableSeeder");
        $this->call("ProductTableSeeder");
        $this->call("OrderTableSeeder");
        $this->call('WishlistsTableSeeder');
        $this->call("OrderItemTableSeeder");
        
       /*$this->call("CategoryTableSeeder");
        $this->call("UserTableSeeder");*/
    }
    
}
