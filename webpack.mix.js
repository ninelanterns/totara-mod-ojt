// require('dotenv').config();
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

if (process.env.NODE_ENV === 'development') {
    mix
        .sass('scss/styles.scss', 'styles-dev.css')
        .scripts('amd/src/slick.js', 'amd/build/slick.js')
        .disableNotifications();
} else {
    mix
        .sass('scss/styles.scss', 'styles.css')
        .scripts('amd/src/slick.js', 'amd/build/slick.min.js')
        .disableNotifications();
}