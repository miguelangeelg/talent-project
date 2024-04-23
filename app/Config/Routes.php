<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/store', 'AuthController::store');
$routes->get('/login', 'AuthController::login');
$routes->post('/loginAction', 'AuthController::loginAction');
$routes->post('/logout', 'AuthController::logout');


$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/job-create', 'JobController::index');
$routes->post('/jobs/store', 'JobController::store');

$routes->get('/user/information', 'UserController::index');
$routes->post('/user/update', 'UserController::update');



