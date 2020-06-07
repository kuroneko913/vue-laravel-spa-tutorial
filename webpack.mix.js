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

mix.browserSync({
    proxy: {
        target: 'http://0.0.0.0:1080' // nginxのサーバーアドレス
    },
    files: [
        "resources/views/**/*.blade.php",
        "public/*"
    ],
    open: false,
    reloadOnRestart: true,
})
.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css')
.version();