<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder {

    public function run() {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {

            App\Models\Account::create([
                "email" => $faker->email,
                "password" => Hash::make("password"),
                "username" => $faker->username
            ]);
        }
    }

}
