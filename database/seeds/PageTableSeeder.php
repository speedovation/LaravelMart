<?php

use Illuminate\Database\Seeder;
use App\Models\Page;


class PageTableSeeder extends DatabaseSeeder {

    public function run() {
        
        $faker = $this->getFaker();
        
        
        $pages = [ "About us" => "about" , "Contact Us" => "contact" , "Support" => "support"];
        

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


    }

}
