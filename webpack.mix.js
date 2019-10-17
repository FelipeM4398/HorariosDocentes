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
    .js('resources/js/register.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    .js('resources/js/informacion.js', 'public/js')
    .sass('resources/sass/login.scss', 'public/css')
    .sass('resources/sass/disponibilidad.scss', 'public/css')
    .sass('resources/sass/programas.scss', 'public/css')
    .sass('resources/sass/usuarios.scss', 'public/css')
    .sass('resources/sass/dashboard.scss', 'public/css')
    .sass('resources/sass/informacion.scss', 'public/css')
    .sass('resources/sass/styles.scss', 'public/css');
