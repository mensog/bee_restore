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

mix.js(['resources/js/app.js', 'resources/js/owl.carousel.js'], 'public/js') // внешний сайт
    .postCss("resources/css/app.css", "public/css")
    .styles([
        'resources/css/app.css', 'resources/css/vendor/animate.css/animate.css',
        'resources/css/font-awesome/fontawesome-all.min.css',
        'resources/css/vendor/hs-megamenu/src/hs.megamenu.css',
        'resources/css/vendor/ion-rangeslider/css/ion.rangeSlider.css',
        'resources/css/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
        'resources/css/vendor/fancybox/jquery.fancybox.css',
        'resources/css/vendor/slick-carousel/slick/slick.css',
        'resources/css/vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
        'resources/css/font-beeclub.css', 'resources/css/owl.carousel.min.css',
        'resources/css/owl.theme.default.min.css',
    ], 'public/css/app.css')
    .sass('resources/sass/app.scss', 'public/css/app-sass.css')
    .js([
        'resources/js/admin/app.js',
        'resources/js/admin/libs/spin.js/spin.min.js',
        'resources/js/admin/libs/autosize/jquery.autosize.min.js',
        'resources/js/admin/core/source/App.js',
        'resources/js/admin/libs/d3/d3.min.js',
        'resources/js/admin/libs/d3/d3.v3.js',
        'resources/js/admin/core/source/AppNavigation.js',
        'resources/js/admin/core/source/AppOffcanvas.js',
        'resources/js/admin/core/source/AppCard.js',
        'resources/js/admin/core/source/AppForm.js',
        'resources/js/admin/core/source/AppNavSearch.js',
        'resources/js/admin/core/source/AppVendor.js',
        'resources/js/admin/libs/select2/select2.min.js',
        'resources/js/admin/libs/nestable/jquery.nestable.js',
        'resources/js/admin/libs/bootstrap-datepicker/bootstrap-datepicker.js',
        'resources/js/admin/libs/dropzone/dropzone.min.js',
        'resources/js/admin/libs/jquery-validation/dist/jquery.validate.min.js',
        'resources/js/admin/libs/jquery-validation/src/localization/messages_ru.js',
        'resources/js/admin/libs/jquery-validation/dist/additional-methods.min.js',
        'resources/js/admin/libs/inputmask/jquery.inputmask.bundle.min.js',
    ], 'public/js/admin') // админка
    .styles([
        'resources/css/admin/theme-4/bootstrap.css',
        'resources/css/admin/theme-4/materialadmin.css',
        'resources/css/admin/theme-4/font-awesome.css',
        'resources/css/admin/theme-4/material-design-iconic-font.min.css',
        'resources/css/admin/theme-4/libs/DataTables/jquery.dataTables.css',
        'resources/css/admin/theme-4/libs/DataTables/extensions/dataTables.colVis.css',
        'resources/css/admin/theme-4/libs/DataTables/extensions/dataTables.tableTools.css',
        'resources/css/admin/theme-4/libs/nestable/nestable.css',
        'resources/css/admin/theme-4/libs/select2/select2.css',
        'resources/css/admin/app.css',
        'resources/css/admin/theme-4/libs/bootstrap-datepicker/datepicker3.css',
        'resources/css/admin/theme-4/libs/dropzone/dropzone-theme.css'
    ], 'public/css/admin/app.css')
    .sass('resources/sass/admin/app.scss', 'public/css/admin/app-sass.css')
    .version();
