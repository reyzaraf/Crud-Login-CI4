<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
	
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
// $routes->get('/register', 'Register::index');
$routes->get('/user', 'UserController::index');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/save', 'UserController::save');
$routes->add('/user/delete/(:any)', 'UserController::delete/$1');
$routes->add('/user/edit/(:any)', 'UserController::edit/$1');
$routes->add('/user/update/(:any)', 'UserController::update/$1');


$routes->get('/daur_ulang', 'DaurUlang::index');
$routes->get('/daur_ulang/create', 'DaurUlang::create');
$routes->post('/daur_ulang/save', 'DaurUlang::save');
$routes->add('/daur_ulang/delete/(:any)', 'DaurUlang::delete/$1');
$routes->add('/daur_ulang/edit/(:any)', 'DaurUlang::edit/$1');
$routes->add('/daur_ulang/update/(:any)', 'DaurUlang::update/$1');

$routes->get('/donasi', 'DonationBook::index');
$routes->get('/donasi/create', 'DonationBook::create');
$routes->post('/donasi/save', 'DonationBook::save');
$routes->add('/donasi/delete/(:any)', 'DonationBook::delete/$1');
$routes->add('/donasi/edit/(:any)', 'DonationBook::edit/$1');
$routes->add('/donasi/update/(:any)', 'DonationBook::update/$1');



$routes->get('/prelovebook', 'PreloveBook::index');
$routes->get('/prelovebook/create', 'PreloveBook::create');
$routes->post('/prelovebook/save', 'PreloveBook::save');
$routes->add('/prelovebook/edit/(:any)', 'PreloveBook::edit/$1');
$routes->add('/prelovebook/update/(:any)', 'PreloveBook::update/$1');
$routes->add('/prelovebook/delete/(:any)', 'PreloveBook::delete/$1');
$routes->post('/register/save', 'Register::save');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
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
