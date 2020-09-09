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

mix

//my styles
.sass('resources/sass/style.scss', 'public/css/bootstrap.css')
.styles('resources/css/style.css', 'public/css/style.css')

//datatables styles
.styles('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/css/dataTables.bootstrap4.css')
.styles('node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css', 'public/css/responsive.bootstrap4.css')

//sweetalert2 style
.styles('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/css/sweetalert2.css')

//jquery
.scripts('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.js')

//bootstrap4
.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/bootstrap.js')

//datatables scripts
.scripts('node_modules/datatables.net/js/jquery.dataTables.min.js', 'public/js/dataTables.js')
.scripts('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'public/js/dataTables.bootstrap4.js')
.scripts('node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js', 'public/js/responsive.bootstrap4.js')
.scripts('node_modules/datatables.net-responsive/js/dataTables.responsive.min.js', 'public/js/dataTables.responsive.js')

//sweetalert script
.scripts('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/js/sweetalert2.js')


//my scripts
.scripts('resources/views/admin/laboratories/js/laboratories.js', 'public/js/laboratories.js')
.scripts('resources/views/admin/users/js/users.js', 'public/js/users.js')
.scripts('resources/views/admin/category/js/category.js', 'public/js/category.js')
.scripts('resources/js/login.js', 'public/js/login.js')


.version();