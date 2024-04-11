<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/logout', 'SigninController::logout');
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);



$routes->get('/stripe', 'StripeController::index');
$routes->post('/stripe/create-charge', 'StripeController::createCharge');
$routes->get('stripe/refund/(:segment)', 'StripeController::refund/$1');

$routes->post('/stripe/generate_invoice', 'StripeController::generate_invoice');

$filters = ['filter' => 'authGuard'];
$routes->match(['get', 'post'], 'Crud/sendMail', 'Crud::sendMail',$filters);
$routes->get('crud/email_sent', 'Crud::email_sent', $filters);
$routes->get('crud/exportCSV', 'Crud::exportCSV',$filters);
$routes->get('success', 'Crud::success', $filters);
$routes->get('crud', 'Crud::index', $filters);
$routes->get('crud/pdf', 'Crud::pdf', $filters);
$routes->match(['get', 'post'], 'Crud/htmlToPDF', 'Crud::htmlToPDF',$filters);
$routes->get('crud/add', 'Crud::add', $filters);
$routes->post('crud/add_validation', 'Crud::add_validation', $filters);
$routes->post('crud/edit_validation', 'Crud::edit_validation', $filters);
$routes->get('crud/fetch_single_data/(:num)', 'Crud::fetch_single_data/$1', $filters);
$routes->get('crud/delete/(:num)', 'Crud::delete/$1', $filters);
$routes->get('crud/pdf', 'Crud::pdf', $filters);
$routes->get('', 'Main::index',$filters);
$routes->get('(:segment)', 'Main::$1',$filters);
$routes->get('(:segment)/(:any)', 'Main::$1/$2',$filters);
$routes->match(['post'], 'user_add', 'Main::user_add',$filters);
$routes->match(['post'], 'user_edit/(:num)', 'Main::user_edit/$1',$filters);
$routes->match(['post'], 'product_edit/(:num)', 'Main::product_edit/$1',$filters);
$routes->match(['post'], 'product_add', 'Main::product_add/$1',$filters);




