const mix = require('laravel-mix');

const VuetifyLoaderPlugin = require('vuetify-loader/plugin');
const CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');
var webpackConfig = {
        plugins: [
            new VuetifyLoaderPlugin(),
            new CaseSensitivePathsPlugin(),
        ]
    }
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

mix.webpackConfig(webpackConfig);

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);