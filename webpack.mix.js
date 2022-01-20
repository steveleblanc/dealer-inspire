const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
.sass('resources/scss/app.scss','public/css');
mix.copy('vendor/bootstrap/css/', 'public/css/bootstrap');
mix.copy('vendor/bootstrap/fonts/', 'public/fonts');
mix.copy('vendor/bootstrap/js/', 'public/js/bootstrap');
mix.copy('vendor/jquery/', 'public/js/jquery');
mix.copy('vendor/font-awesome/', 'public/fonts');
