<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index'); /** routes dashboard */


// routes login dan register(sign up)
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
$routes->get('/login/index', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');



// grup routes table
$routes->group('table', function($routes){
	// tabel 3b71
	$routes->get('table3b71', 'Table3b71::index');
	$routes->get('table3b71/(:segment)/preview', 'Table3b71::preview/$1');
    $routes->add('table3b71/new', 'Table3b71::create');
	$routes->add('table3b71/(:segment)/edit', 'Table3b71::edit/$1');
	$routes->get('table3b71/(:segment)/delete', 'Table3b71::delete/$1');
	$routes->get('table3b71/cari', 'Table3b71::cari');

	// tabel 3b72
	$routes->get('table3b72', 'Table3b72::index');
	$routes->get('table3b72/(:segment)/preview', 'Table3b72::preview/$1');
    $routes->add('table3b72/new', 'Table3b72::create');
	$routes->add('table3b72/(:segment)/edit', 'Table3b72::edit/$1');
	$routes->get('table3b72/(:segment)/delete', 'Table3b72::delete/$1');
	$routes->get('table3b72/cari', 'Table3b72::cari');

	// tabel 3b73
	$routes->get('table3b73', 'table3b73::index');
	$routes->get('table3b73/(:segment)/preview', 'table3b73::preview/$1');
    $routes->add('table3b73/new', 'table3b73::create');
	$routes->add('table3b73/(:segment)/edit', 'table3b73::edit/$1');
	$routes->get('table3b73/(:segment)/delete', 'table3b73::delete/$1');
	$routes->get('table3b73/cari', 'table3b73::cari');

	// tabel 3b74
	$routes->get('table3b74', 'table3b74::index');
	$routes->get('table3b74/(:segment)/preview', 'table3b74::preview/$1');
    $routes->add('table3b74/new', 'table3b74::create');
	$routes->add('table3b74/(:segment)/edit', 'table3b74::edit/$1');
	$routes->get('table3b74/(:segment)/delete', 'table3b74::delete/$1');
	$routes->get('table3b74/cari', 'table3b74::cari');

	// tabel 4

	// tabel 5a
	$routes->get('table5a', 'table5a::index');
	$routes->get('table5a/(:segment)/preview', 'table5a::preview/$1');
    $routes->add('table5a/new', 'table5a::create');
	$routes->add('table5a/(:segment)/edit', 'table5a::edit/$1');
	$routes->get('table5a/(:segment)/delete', 'table5a::delete/$1');
	$routes->get('table5a/cari', 'table5a::cari');

	// tabel 5b
	$routes->get('table5b', 'table5b::index');
	$routes->get('table5b/(:segment)/preview', 'table5b::preview/$1');
    $routes->add('table5b/new', 'table5b::create');
	$routes->add('table5b/(:segment)/edit', 'table5b::edit/$1');
	$routes->get('table5b/(:segment)/delete', 'table5b::delete/$1');
	$routes->get('table5b/cari', 'table5b::cari');

	// tabel 5c
	$routes->get('table5c', 'table5c::index');
    $routes->get('table5c/(:segment)/preview', 'table5c::preview/$1');
    $routes->add('table5c/new', 'table5c::create');
    $routes->add('table5c/(:segment)/edit', 'table5b::edit/$1');
    $routes->get('table5c/(:segment)/delete', 'table5b::delete/$1');
    $routes->get('table5c/cari', 'table5c::cari');


});