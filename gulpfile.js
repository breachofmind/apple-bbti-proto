var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix)
{
    mix.sass('app.scss');
    mix.scripts([
        'jquery/dist/jquery.js',
        'angular/angular.js',
        'gsap/src/uncompressed/TweenLite.js',
        'gsap/src/uncompressed/plugins/ScrollToPlugin.js',
        'jquery-ui.js'

    ], 'public/static/lib.js', 'resources/assets/vendor');

    mix.scripts([
        'main.js'
    ], 'public/static/src.js');

    mix.livereload();
});
