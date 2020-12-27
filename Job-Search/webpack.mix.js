const mix = require('laravel-mix')

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

mix.disableNotifications()

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .options({
        postCss: [require('postcss-import'), require('tailwindcss')],
    })
    .copy(
        './node_modules/normalize.css/normalize.css',
        'public/libs/css/normalize.css'
    )
    .copy(
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        'public/libs/css/bootstrap.min.css'
    )

    .copy(
        './node_modules/jquery/dist/jquery.min.js',
        'public/libs/js/jquery.min.js'
    )

    .copy(
        './node_modules/jquery/dist/jquery.slim.min.js',
        'public/libs/js/jquery.slim.min.js'
    )

    .copy(
        './node_modules/@popperjs/core/dist/umd/popper.min.js',
        'public/libs/js/popper.min.js'
    )

    .copy(
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
        'public/libs/js/bootstrap.min.js'
    )

    .webpackConfig(require('./webpack.config'))
