const mix = require('laravel-mix');

mix.js('resources/js/app.mjs', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/nav.css', 'public/css')
    .css('resources/css/footer.css', 'public/css');