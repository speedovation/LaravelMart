<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;

class BlogTableSeeder extends DatabaseSeeder {
    
    public function run() {
        
        $faker = $this->getFaker();
        
        
        Blog::truncate();
        
        return;
        
        $categories = Category::all();
        
        foreach ($categories as $category) {
            
            for($i=0;$i<10;$i++)
            {
                $title = $this->title(rand(4,6), $faker);
                $url = str_replace(' ','-',$title);
                Blog::create([
                "title" => $title,
                "url"  => $url,
                "status"  => "live",
                "visibility"  => "public",
                "category_id" => $category->id, 
                "body"  =>  $faker->realtext(3000,4),
                "type"  => "html",
                ]);
            }
        }
        
        
    }
    
    public function title($nbWords = 5, $faker)
    {
        $sentence =  $faker->sentence($nbWords);
        return substr($sentence, 0, strlen($sentence) - 1);
    }
    
}
