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
});

// nilai mhs pertemuan
$routes->group('nilai-pertemuan-mahasiswa', function ($routes) {
	$routes->get('/', 'NilaiMhsPertemuan::index');
	$routes->post('getData', 'NilaiMhsPertemuan::getData');
	$routes->post('newData', 'NilaiMhsPertemuan::createData');
	$routes->post('updateData', 'NilaiMhsPertemuan::updateById');
	$routes->get('getById', 'NilaiMhsPertemuan::getById');
	$routes->post('deleteById', 'NilaiMhsPertemuan::deleteById');
	$routes->get('export', 'NilaiMhsPertemuan::exportExcel');
});

// grup korelasi cpl-cpmk
$routes->group('korelasi-cpl-cpmk', function ($routes) {
	$routes->get('/', 'KorelasiCplCpmk::index');
	$routes->post('getData', 'KorelasiCplCpmk::getData');
	$routes->post('newData', 'KorelasiCplCpmk::createData');
	$routes->post('updateData', 'KorelasiCplCpmk::updateById');
	$routes->get('getById', 'KorelasiCplCpmk::getById');
	$routes->post('deleteById', 'KorelasiCplCpmk::deleteById');
	$routes->get('export', 'KorelasiCplCpmk::exportExcel');
});

// grup rencana pembelajaran
$routes->group('rencana-pembelajaran', function ($routes) {
	$routes->get('/', 'RencanaPembelajaran::index');
	$routes->post('getData', 'RencanaPembelajaran::getData');
	$routes->post('newData', 'RencanaPembelajaran::createData');
	$routes->post('updateData', 'RencanaPembelajaran::updateById');
	$routes->get('getById', 'RencanaPembelajaran::getById');
	$routes->post('deleteById', 'RencanaPembelajaran::deleteById');
	$routes->get('export', 'RencanaPembelajaran::exportExcel');
});

// grup cpl
$routes->group('capaian-lulusan', function ($routes) {
	$routes->get('/', 'CapaianLulusan::index');
	$routes->post('getData', 'CapaianLulusan::getData');
	$routes->post('newData', 'CapaianLulusan::createData');
	$routes->post('updateData', 'CapaianLulusan::updateById');
	$routes->get('getById', 'CapaianLulusan::getById');
	$routes->post('deleteById', 'CapaianLulusan::deleteById');
	$routes->get('export', 'CapaianLulusan::exportExcel');
});

// grup user management
$routes->group('user-management', ['filter' => 'adminAuth'], function ($routes) {
	$routes->get('/', 'UserManagement::index');
	$routes->post('getData', 'UserManagement::getData');
	$routes->post('newData', 'UserManagement::createData');
	$routes->post('updateData', 'UserManagement::updateData');
	$routes->get('getByUsername', 'UserManagement::getByUsername');
	$routes->post('deleteData', 'UserManagement::deleteData');
});
