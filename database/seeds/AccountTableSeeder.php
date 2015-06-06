<?php

use Illuminate\Database\Seeder;
use App\Models\Account as Account;

class AccountTableSeeder extends DatabaseSeeder {

    public function run() {
        $faker = $this->getFaker();

        for ($i = 0; $i < 10; $i++) {

            Account::create([
                "email" => $faker->email,
                "password" => Hash::make("password"),
                "username" => $faker->username
            ]);
        }
    }

}
