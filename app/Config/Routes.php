<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Auth::auth');
$routes->get('/alumni', 'User::index');


$routes->add('Admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->add('User', 'User::index', ['filter' => 'role:user']);
$routes->get('/user', 'Auth::auth', ['filter' => 'role:user']);
$routes->get('/admin', 'Auth::auth', ['filter' => 'role:admin']);

$routes->get('/admin/users', 'Admin::users', ['filter' => 'role:admin']);
$routes->get('/admin/approval', 'Admin::approval', ['filter' => 'role:admin']);

$routes->get('/user/form', 'User::form', ['filter' => 'role:user']);
$routes->post('/user/save', 'User::save', ['filter' => 'role:user']);
