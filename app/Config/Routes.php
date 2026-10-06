<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('customers', 'Customers::index');
$routes->get('users', 'Users::index');
$routes->get('/', 'Home::index');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');

$routes->get('tasks', 'Tasks::index');
$routes->get('about', 'Pages::about');
$routes->get('profile', 'Pages::profile');

$routes->get('tasks/new', 'Tasks::new', ['filter' => 'auth']);
$routes->post('tasks/create', 'Tasks::create', ['filter' => 'auth']);

$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/update/(:num)', 'Tasks::update/$1', ['filter' => 'auth']);

$routes->post('tasks/delete/(:num)', 'Tasks::delete/$1', ['filter' => 'auth']);
