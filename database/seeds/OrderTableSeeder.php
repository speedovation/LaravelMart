<?php

use Illuminate\Database\Seeder;
use App\Models\Account as Account;
use App\Models\Order as Order;

class OrderTableSeeder extends DatabaseSeeder {

    public function run() {
        $faker = $this->getFaker();

        $accounts = Account::all();

        foreach ($accounts as $account) {
            for ($i = 0; $i < rand(-1, 5); $i++) {
                Order::create([
                    "account_id" => $account->id
                ]);
            }
        }
    }

}
