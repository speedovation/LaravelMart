<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionTableSeeder extends DatabaseSeeder {

    public function run() {
        
        $faker = $this->getFaker();
        
        
/*        $pages = [ "admin-access" => "Admin Access" , "m" => "contact" , "Support" => "support"];
        

        foreach($pages as $title => $url )
        {
             Permission::create([
                    "title" => $title,
                    "url"  => $url,
                    "status"  => "live",
                    "visibility"  => "public",
                    "body"  =>  $faker->realtext(1000,4),
                    "type"  => "html",
                    ]);
        }*/


    }

}
