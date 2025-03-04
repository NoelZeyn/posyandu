const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/*.js', 'public/js')
    .vue()  // Untuk mendukung Vue file
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .alias({
        '@': path.resolve('resources/js'),
    });
