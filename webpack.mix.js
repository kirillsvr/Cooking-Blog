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

mix.styles([
    'resources/assets/admin/css/font-awesome.css',
    'resources/assets/admin/css/style.css',
    'resources/assets/admin/css/color-1.css',
    'resources/assets/admin/css/responsive.css',
], 'public/assets/admin/css/styles.css');

mix.styles([
    'resources/assets/admin/css/vendors/icofont.css',
    'resources/assets/admin/css/vendors/themify.css',
    'resources/assets/admin/css/vendors/flag-icon.css',
    'resources/assets/admin/css/vendors/feather-icon.css',
    'resources/assets/admin/css/vendors/scrollbar.css',
    'resources/assets/admin/css/vendors/bootstrap.css',
], 'public/assets/admin/css/styles-vendor.css');

mix.scripts([
    'resources/assets/admin/js/jquery-3.5.1.min.js',
    'resources/assets/admin/js/bootstrap/bootstrap.bundle.min.js',
    'resources/assets/admin/js/icons/feather-icon/feather.min.js',
    'resources/assets/admin/js/icons/feather-icon/feather-icon.js',
    'resources/assets/admin/js/scrollbar/simplebar.js',
    'resources/assets/admin/js/scrollbar/custom.js',
    'resources/assets/admin/js/config.js',
    'resources/assets/admin/js/sidebar-menu.js',
    'resources/assets/admin/js/tooltip-init.js',
    'resources/assets/admin/js/script.js',
    'resources/assets/admin/js/theme-customizer/customizer.js',
], 'public/assets/admin/js/script.js');

mix.copyDirectory('resources/assets/admin/fonts', 'public/assets/admin/fonts');
mix.copyDirectory('resources/assets/admin/images', 'public/assets/admin/images');
