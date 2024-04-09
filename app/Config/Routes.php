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


$filters = ['filter' => 'authGuard'];
$routes->get('crud', 'Crud::index', $filters);
$routes->get('crud/add', 'Crud::add', $filters);
$routes->post('crud/add_validation', 'Crud::add_validation', $filters);
$routes->post('crud/edit_validation', 'Crud::edit_validation', $filters);
$routes->get('crud/fetch_single_data/(:num)', 'Crud::fetch_single_data/$1', $filters);
$routes->get('crud/delete/(:num)', 'Crud::delete/$1', $filters);

service('auth')->routes($routes);
