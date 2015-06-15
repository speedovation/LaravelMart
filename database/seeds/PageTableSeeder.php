<?php

use Illuminate\Database\Seeder;
use App\Models\Page;


class PageTableSeeder extends DatabaseSeeder {

    public function run() {
        
        $faker = $this->getFaker();
        
        
        $pages = [ "About us" => "about" , "Contact Us" => "contact" , "Support" => "support"];
        
        
        
/*           $cats =  [
              [ "name" => 'Cell Phones Accessories' ,'created_at'=> new DateTime,'updated_at'=> new DateTime ],
              [ "name" =>  'Tablet Accessories' ,'created_at'=> new DateTime,'updated_at'=> new DateTime ],
              [ "name" =>  'Gifts' ,'created_at'=> new DateTime,'updated_at'=> new DateTime],
              [ "name" =>  'Flowers' ,'created_at'=> new DateTime,'updated_at'=> new DateTime]     
                      ];
           DB::table('categories')->insert($cats);*/
        foreach($pages as $title => $url )
        {
             Page::create([
                    "title" => $title,
                    "url"  => $url,
                    "status"  => "live",
                    "visibility"  => "public",
                    "body"  =>  $faker->realtext(1000,4),
                    "type"  => "html",
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
