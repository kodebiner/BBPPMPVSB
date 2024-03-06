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
});

// Schedule
$routes->group('jadwal-kegiatan', static function ($routes) {
    $routes->get('', 'Schedule::index');
});

// Diklat
$routes->group('diklat', static function ($routes) {
    $routes->get('artikel', 'Diklat::indexarticle');
    $routes->get('pendaftaran', 'Diklat::indexregistration');
});

// Seminar
$routes->group('seminar', static function ($routes) {
    $routes->get('', 'Seminar::index');
});

// Webinar
$routes->group('webinar', static function ($routes) {
    $routes->get('', 'Webinar::index');
});