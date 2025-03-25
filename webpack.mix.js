const mix = require('laravel-mix');

mix
    .sass('resources/sass/app.scss', 'public/css')  // Nếu bạn sử dụng SCSS
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])  //
