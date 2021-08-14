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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')

    .sass('resources/scss/bootstrap.scss','public/frota/css/bootstrap.css')
    .postCss('node_modules/bootstrap/dist/css/bootstrap.min.css','public/frota/css/bootstrap.min.css')
    .postCss('node_modules/@fortawesome/fontawesome-free/css/all.css','public/frota/css/fontawesome.css')
    .js('node_modules/jquery/dist/jquery.js','public/frota/js/jquery.js')
    .js('node_modules/jquery/dist/jquery.min.js','public/frota/js/jquery.min.js')
    .js('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/frota/js/bootstrap.js')
    .js('node_modules/@fortawesome/fontawesome-free/js/all.js','public/frota/js/fontawesome.js');
