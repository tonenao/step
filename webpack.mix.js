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
    .js('resources/js/jquery.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .autoload({
        "jquery": ['$', 'window.jQuery']
        // "vue": ['Vue', 'window.Vue']
    })
    .browserSync({
        files: [
            "resources/views/**/*.blade.php",
            "public/**/*.*",
            "config/**/*",
            "routes/**/*",
            "public/**/*"
        ],
        proxy: {
            target: "http://127.0.0.1:8000",
        }
    });
