<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
/** routes dashboard */


// routes login dan register(sign up)
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
$routes->get('/login/index', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');



// grup routes table
$routes->group('table', function ($routes) {
	// tabel 3b71
	$routes->get('table3b71', 'Table3b71::index');
	$routes->get('table3b71/(:segment)/preview', 'Table3b71::preview/$1');
	$routes->add('table3b71/new', 'Table3b71::create');
	$routes->add('table3b71/(:segment)/edit', 'Table3b71::edit/$1');
	$routes->get('table3b71/(:segment)/delete', 'Table3b71::delete/$1');
	$routes->get('table3b71/cari', 'Table3b71::cari');

	$routes->group('korelasi-cpl-cpmk',function ($routes) {
			$routes->get('/', 'KorelasiCplCpmk::index');
			$routes->post('new', 'KorelasiCplCpmk::create');
			$routes->get('(:num)/edit', 'KorelasiCplCpmk::edit/$1');
			$routes->post('update/(:num)', 'KorelasiCplCpmk::update/$1');
			$routes->get('(:num)/delete', 'KorelasiCplCpmk::delete/$1');
		}
	);
});
