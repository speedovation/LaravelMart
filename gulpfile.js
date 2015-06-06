var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
    .styles([
        'base.css', 
        'market.css',
        'megamenu.css',
        'rudra.css',
        'sliders.css',
        'sliders-theme.css',
        '../bower_components/fancybox/source/jquery.fancybox.css',
        '../bower_components/raty/lib/jquery.raty.css'
        //'../bower_components/css-modal/dist/modal.css',
        
        ], 'public/assets/css')
        
    .scripts([
        'holder.min.js',
        'jquery.js',
        'app.js',
        'sliders.js',
        '../bower_components/fancybox/source/jquery.fancybox.js',
        '../bower_components/raty/lib/jquery.raty.js'
       // '../bower_components/css-modal/dist/modal.js',

        ], 'public/assets/js')
        
        
    .version(['public/assets/css/all.css','public/assets/js/all.js']);
});
