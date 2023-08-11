let mix = require('laravel-mix');

mix 
    .sass('./src/sass/main.scss', 'css/main.css')
    .js('./src/js/main.js', 'js/main.js')
    .options({
        processCssUrls: false
    })
    .setPublicPath('assets');
