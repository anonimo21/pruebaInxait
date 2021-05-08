const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

mix.styles([
    'resources/css/styles.css'
], 'public/css/all.css')
    .scripts([
        'resources/js/scripts.js',
        'resources/js/scripts_consultas.js'
    ], 'public/js/all.js');

if (mix.inProduction()) {
    mix.version();
}
