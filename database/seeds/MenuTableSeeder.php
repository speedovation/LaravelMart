<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;


class MenuTableSeeder extends DatabaseSeeder {

    public function run() {
        
        $faker = $this->getFaker();
        
        
        $pages = [ "About Us" => "about" , "Contact Us" => "contact" , "Support" => "support"];
        
        
        
/*           $cats =  [
              [ "name" => 'Cell Phones Accessories' ,'created_at'=> new DateTime,'updated_at'=> new DateTime ],
              [ "name" =>  'Tablet Accessories' ,'created_at'=> new DateTime,'updated_at'=> new DateTime ],
              [ "name" =>  'Gifts' ,'created_at'=> new DateTime,'updated_at'=> new DateTime],
              [ "name" =>  'Flowers' ,'created_at'=> new DateTime,'updated_at'=> new DateTime]     
                      ];
           DB::table('categories')->insert($cats);*/
        foreach($pages as $name => $url )
        {
             Menu::create([
                    "name" => $name,
                    "url"  => $url,
                    
                    ]);
        }
//                for ($i = 0; $i < 10; $i++) {
//            $name = ucwords($faker->word);
//
//            Category::create([
//                "name" => $name
//            ]);
//        }
    }

}
