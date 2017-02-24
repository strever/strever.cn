const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');
mix.styles(['resources/assets/css/article.css'], 'public/css/article.css');
mix.copy('node_modules/marked/marked.min.js', 'public/js/vendor/marked.min.js');
mix.styles('node_modules/github-markdown-css/github-markdown.css', 'public/css/vendor/github-markdown.css');
