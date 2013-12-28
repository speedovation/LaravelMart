<?php

class UsersTableSeeder extends DatabaseSeeder {

    public function run() {
        $user =
                [
                    "username" => "yash",
                    "password" => Hash::make("nice121"),
                    "email" => "code.yash@gmail.com"
        ];



        User::create($user);


        $faker = $this->getFaker();



        for ($i = 0; $i < 10; $i++) {
            //$email = $faker->email;
           // $password = Hash::make("password");

            User::create([
                
                "username" =>$faker->username,
                "email" => $faker->email,
                "password" => Hash::make("password")
            ]);
        }
    }

}