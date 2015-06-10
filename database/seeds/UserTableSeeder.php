<?php

use Illuminate\Database\Seeder;
use App\Models\User;

use Faker\Provider\en_US\Person;

class UserTableSeeder extends DatabaseSeeder {

    public function run() {
        $faker = $this->getFaker();

        for ($i = 0; $i < 10; $i++) {

            User::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "password" => Hash::make("password")
            ]);
        }
    }

}
