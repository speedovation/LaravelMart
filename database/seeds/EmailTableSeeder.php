<?php

use Illuminate\Database\Seeder;
use App\Models\Email;


class EmailTableSeeder extends DatabaseSeeder {
    
    public function run() {
        
        $faker = $this->getFaker();
        
        
        $emails = [
            "Product on backorder notification" => [ "backorder_notification", "What is it about"],
            "Low stock notification" => [ "", ""],
            "Send customer invoice" => [ "", ""],
            "Customer order status on-hold to processing" => [ "", ""],
            "Customer order status pending to waiting for payment" => [ "", ""],
            "Customer order status pending to on-hold" => [ "", ""],
            "Customer order status pending to processing" => [ "", ""],
            "New order admin notification" => [ "", ""],
            "Customer order status completed" => [ "", ""],
            "Customer order status refunded" => [ "", ""],
            "No stock notification" => [ "no_stock_notification", "What is it about"],
        ];
        
        
        
        foreach($emails as $key => $email)
        {
           //echo $key; print_r($email);
            Email::create([
            "key"  => $key,
            "value"  => $email[0],
            "comment" => $email[1]
            ]);
        }
        
        
        
    }
    
}
