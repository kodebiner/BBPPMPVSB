<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Home
$routes->group('/', static function ($routes) {
    $routes->get('', 'Home::index');
});

// News
$routes->group('berita', static function ($routes) {
    $routes->get('', 'News::index');
    $routes->get('(:any)', 'News::article/$1');
});

// Schedule
$routes->group('jadwal-kegiatan', static function ($routes) {
    $routes->get('', 'Schedule::index');
});

// Diklat
$routes->group('diklat', static function ($routes) {
    $routes->get('artikel', 'Diklat::indexarticle');
    $routes->get('pendaftaran', 'Diklat::indexregistration');
    $routes->get('artikel/(:any)', 'Diklat::diklatarticle/$1');
    $routes->get('pendaftaran/(:any)', 'Diklat::diklatregistration/$1');
});

// Seminar
$routes->group('seminar', static function ($routes) {
    $routes->get('', 'Seminar::index');
    $routes->get('(:any)', 'Seminar::article/$1');
});

// Webinar
$routes->group('webinar', static function ($routes) {
    $routes->get('', 'Webinar::index');
    $routes->get('(:any)', 'Webinar::article/$1');
});