const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/frontend.js', 'public/js')
    .js('resources/js/backend.js', 'public/js')
    .js('resources/js/backend/dishesvalidation.js', 'public/js/backend')
    .js('resources/js/backend/registervalidation.js', 'public/js/backend')
    .js('resources/js/store.js', 'public/js')
    .sass('resources/sass/frontend.scss', 'public/css')
    .sass('resources/sass/backend.scss', 'public/css')
    .copy('node_modules/chart.js/dist/chart.js', 'public/chart.js/chart.js')
    