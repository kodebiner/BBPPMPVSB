<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Home
$routes->group('/', static function ($routes) {
    $routes->get('', 'Home::index');
    $routes->get('migration', 'Home::migration');
});

// News
$routes->group('berita', static function ($routes) {
    $routes->get('', 'News::index');
    $routes->get('(:any)', 'News::article/$1');
});

// Schedule
$routes->group('jadwal-kegiatan', static function ($routes) {
    $routes->get('', 'Schedule::index');
    $routes->get('(:any)', 'Schedule::article/$1');
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

// Gallery
$routes->group('galeri', static function ($routes) {
    $routes->get('foto', 'Gallery::indexphoto');
    $routes->get('video', 'Gallery::indexvideo');
});

// Profile
$routes->group('profil', static function ($routes) {
    $routes->get('', 'Profile::index');
});