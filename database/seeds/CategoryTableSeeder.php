<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends DatabaseSeeder {

    public function run() {
        
        $faker = $this->getFaker();
        
           $categories =  [
            
                [ "name" => 'Cell Phones Accessories' ,'desc'=> 'Random','icon'=> 'desktop_windows' ],
                [ "name" => 'Cell Phones Accessories' ,'desc'=> 'Random','icon'=> 'desktop_windows' ],

                [
                    "name" => 'Virtualization',
                    'desc' => 'Windows  Virtualization technology discussion.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'PC Custom Builds and Overclocking',
                    'desc' => 'PC building, modding, overclocking, benchmarking & cooling discussion.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Tutorials',
                    'desc' => 'Windows  tutorials, tricks, tips, and guides.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Installation & Setup',
                    'desc' => 'Installation, Upgrade and Setup Help.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Performance & Maintenance',
                    'desc' => 'Windows tweaking, maintenance and optimization.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Network & Sharing ',
                    'desc' => 'Windows network, sharing and homegroup support.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Drivers & Hardware',
                    'desc' => 'Windows compatible hardware and driver support.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Graphic Cards',
                    'desc' => 'Help and solutions with graphic cards in Windows 8.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Sound & Audio ',
                    'desc' => 'Sound card and general audio support.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'BSOD Crashes and Debugging',
                    'desc' => 'BSOD crash analysis, debugging and error reports help.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Tablet and Touch',
                    'desc' => 'Support for Windows tablet and touch devices.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Software and Apps',
                    'desc' => 'General software and Metro App help and support.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Windows Updates & Activation',
                    'desc' => 'Windows updates and activation discussion.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'User Accounts and Family Safety ',
                    'desc' => 'User account and parental setting help and support.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Browsers & Mail',
                    'desc' => 'Internet browser and Email help and support.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'Customization ',
                    'desc' => 'Latest games discussion, information and tweaks.',
                    'icon'=> 'desktop_windows' 
                ],
                [
                    "name" => 'System Security',
                    'desc' => 'Windows Antivirus and firewall help and support.',
                    'icon'=> 'desktop_windows' 
                ],
                



            
                      ];
        
        
       foreach ($categories as $category) 
       {
            Category::create([
            "name" => $category['name'],
            "desc"  => $category['desc'],
            "icon"  => $category['icon'],
            "status"  => "live",
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
