<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Home
$routes->get('/', 'Home::index');

// News
$routes->get('berita', 'News::index');

// Schedule
$routes->get('jadwal-kegiatan', 'Schedule::index');

// Diklat
$routes->get('diklat', 'Diklat::index');