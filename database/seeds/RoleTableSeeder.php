<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Role_user;


class RoleTableSeeder extends DatabaseSeeder {

    public function run() {
        
        $faker = $this->getFaker();
        
        
        $roles = [ "admin" => "Admin" , 
                   "moderator" => "Moderator" , 
                   "power" => "Power User" , 
                   "user" => "Logged In User",
                   "guest" => "Guest",
              ];
        

        $n= 1;
        foreach($roles as $name => $display_name )
        {
             $pr = Role::create([
                    "name" => $name,
                    "display_name"  => $display_name,
                    ]);
              

              Role_user::create([
                    "user_id" => $n,
                    "role_id"  => $pr->id,
                    ]);
              
              $n++;
              
              
        }
       
       
      


    }

}
