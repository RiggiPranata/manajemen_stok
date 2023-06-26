<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Admin::index');
$routes->get('/index', 'Dashboard::index');

$routes->get('/dashboard', 'Admin::index');
$routes->get('/manage_users', 'Admin::manage_users', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::user_detail/$1', ['filter' => 'role:admin']);
$routes->get('/admin/delete_user/(:num)', 'Admin::delete_user/$1', ['filter' => 'role:admin']);
$routes->get('/manage_supplier', 'Supplier::index', ['filter' => 'role:admin']);
$routes->get('/supplier/add', 'Supplier::add', ['filter' => 'role:admin']);
$routes->post('/supplier/save', 'Supplier::save', ['filter' => 'role:admin']);
$routes->get('/supplier/edit/(:num)', 'Supplier::edit/$1', ['filter' => 'role:admin']);
$routes->post('/supplier/update', 'Supplier::update', ['filter' => 'role:admin']);
$routes->get('/supplier/delete/(:num)', 'Supplier::delete/$1', ['filter' => 'role:admin']);
$routes->get('/catagory', 'Katagori::index', ['filter' => 'role:admin']);
$routes->get('/catagory/add', 'Katagori::add', ['filter' => 'role:admin']);
$routes->post('/catagory/save', 'Katagori::save', ['filter' => 'role:admin']);
$routes->get('/catagory/delete/(:num)', 'Katagori::delete/$1', ['filter' => 'role:admin']);
$routes->get('/catagory/edit/(:num)', 'Katagori::edit/$1', ['filter' => 'role:admin']);
$routes->post('/catagory/update', 'Katagori::update', ['filter' => 'role:admin']);
$routes->get('/item', 'Item::index', ['filter' => 'role:admin']);
$routes->get('/item/add', 'Item::add', ['filter' => 'role:admin']);
$routes->post('/item/save', 'Item::save', ['filter' => 'role:admin']);
$routes->get('/item/delete/(:num)', 'Item::delete/$1', ['filter' => 'role:admin']);
$routes->get('/item/edit/(:num)', 'Item::edit/$1', ['filter' => 'role:admin']);
$routes->post('/item/update', 'Item::update', ['filter' => 'role:admin']);
$routes->get('/manage_supply', 'ManajemenStok::index', ['filter' => 'role:admin']);
$routes->get('/manage_supply/add', 'ManajemenStok::add', ['filter' => 'role:admin']);
$routes->post('/manage_supply/save', 'ManajemenStok::save', ['filter' => 'role:admin']);
$routes->get('/manage_supply/delete/(:num)', 'ManajemenStok::delete/$1', ['filter' => 'role:admin']);
$routes->get('/manage_supply/edit/(:num)', 'ManajemenStok::edit/$1', ['filter' => 'role:admin']);
$routes->post('/manage_supply/update', 'ManajemenStok::update', ['filter' => 'role:admin']);
$routes->get('/manage_request', 'Request::index');
$routes->get('/manage_request/add', 'Request::add', ['filter' => 'role:admin']);
$routes->post('/manage_request/save', 'Request::save', ['filter' => 'role:admin']);
$routes->get('/manage_request/delete/(:num)', 'Request::delete/$1', ['filter' => 'role:admin']);
$routes->get('/manage_request/edit/(:num)', 'Request::edit/$1', ['filter' => 'role:admin']);
$routes->post('/manage_request/update', 'Request::update', ['filter' => 'role:admin']);
$routes->post('/item/get_harga', 'Item::get_harga', ['filter' => 'role:admin']);
$routes->post('/manage_supply/check-stok', 'ManajemenStok::checkStok', ['filter' => 'role:admin']);
$routes->get('/purchase_report', 'Admin::purchase_report', ['filter' => 'role:admin']);


$routes->get('/myprofile', 'Karyawan::index');


$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);



//breadcrumbs
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
