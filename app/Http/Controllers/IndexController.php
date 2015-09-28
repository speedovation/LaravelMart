<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;


class IndexController extends CoreController {
    
    
    public function indexAction() {
        return view("home.index");
    }
    
    public function getKg() {
        return view("kg.index");
    }
    
    public function getCategories() {
        
        $categories = Category::whereNull('parent_id')
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('kg.categories')->with( ['categories'=>$categories, 'title' => 'All Categories']);
        
    }
    
    
    public function getSitemap()
    {
        // create new sitemap object
        $sitemap = \App::make("sitemap");
        
        // set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
        // by default cache is disabled
        //$sitemap->setCache('laravel.sitemap', 3600);
        
        // check if there is cached sitemap and build new only if is not
        //if (!$sitemap->isCached())
        {
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(\URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
            $sitemap->add(\URL::to('/kb'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
            
            // add item with translations (url, date, priority, freq, images, title, translations)
            /*$translations = [
            ['language' => 'fr', 'url' => URL::to('pageFr')],
            ['language' => 'de', 'url' => URL::to('pageDe')],
            ['language' => 'bg', 'url' => URL::to('pageBg')],
            ];
            $sitemap->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);*/
            
            // add item with images
            /*$images = [
            ['url' => URL::to('images/pic1.jpg'), 'title' => 'Image title', 'caption' => 'Image caption', 'geo_location' => 'Plovdiv, Bulgaria'],
            ['url' => URL::to('images/pic2.jpg'), 'title' => 'Image title2', 'caption' => 'Image caption2'],
            ['url' => URL::to('images/pic3.jpg'), 'title' => 'Image title3'],
            ];
            $sitemap->add(URL::to('post-with-images'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', $images);*/
            
            // get all posts from db
            $posts = Blog::orderBy('created_at', 'desc')->get();
      
            // add every post to the sitemap
            //$post->priority
            
            // Article : priority freq image
            foreach ($posts as $post)
            {
                print($post->modified_at);
                $sitemap->add($post->title, $post->modified_at, '1', 'weekly');
            }
        }
        
        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }
    
    
}
