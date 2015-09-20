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
        'inventive.css', 
        'market.css',
        'megamenu.css',
        'rudra.css',
        'sliders.css',
        'sliders-theme.css',
        '../bower_components/fancybox/source/jquery.fancybox.css',
        '../bower_components/raty/lib/jquery.raty.css',
        '../bower_components/selectize/dist/css/selectize.css',
        'materialicon.css',
        '../bower_components/Buttons/css/buttons.min.css',
        'kara.css'
/*        '../bower_components/select2/dist/css/select2.css'*/
/*        '../bower_components/chosen/chosen.min.css'*/
        //'../bower_components/css-modal/dist/modal.css',
        
        ], 'public/assets/css')
        
    .scripts([
        'holder.min.js',
        'jquery.js',
        'app.js',
        'sliders.js',
        '../bower_components/fancybox/source/jquery.fancybox.js',
        '../bower_components/raty/lib/jquery.raty.js',
        '../bower_components/selectize/dist/js/standalone/selectize.js'
/*        '../bower_components/select2/dist/js/select2.js'*/
/*        '../bower_components/chosen/chosen.jquery.min.js'*/
       // '../bower_components/css-modal/dist/modal.js',

        ], 'public/assets/js')
        
        
    .version(['public/assets/css/all.css','public/assets/js/all.js']);
});
