<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Shield
service('auth')->routes($routes, ['except' => ['login', 'register',]]);
$routes->get('login', '\App\Controllers\Login::loginView');
$routes->get('register', '\App\Controllers\Register::registerView');
$routes->post('register', '\App\Controllers\Register::registerAction');
$routes->post('login', '\App\Controllers\Login::loginAction');

// Dasboard
$routes->group('dashboard', static function ($routes) {
    service('auth')->routes($routes);
    $routes->get('', 'Auth::dashboard', ['filter' => 'session']);

    // Users
    $routes->get('users', 'Auth::users', ['filter' => 'session']);
    $routes->get('addusers', 'Auth::addusers', ['filter' => 'session']);
    $routes->get('editusers/(:num)', 'Auth::editusers/$1', ['filter' => 'session']);

    // Berita
    $routes->get('berita', 'Auth::berita', ['filter' => 'session']);
    $routes->get('addberita', 'Auth::addberita', ['filter' => 'session']);
    $routes->get('editberita/(:num)', 'Auth::editberita/$1', ['filter' => 'session']);
    $routes->post('removeberita/(:num)', 'Auth::removeberita/$1', ['filter' => 'session']);

    // Artista
    $routes->get('artista', 'Auth::artista', ['filter' => 'session']);
    $routes->get('addartista', 'Auth::addartista', ['filter' => 'session']);
    $routes->get('editartista/(:num)', 'Auth::editartista/$1', ['filter' => 'session']);
    $routes->post('removeartista/(:num)', 'Auth::removeartista/$1', ['filter' => 'session']);

    // Seminar
    $routes->get('seminar', 'Auth::seminar', ['filter' => 'session']);
    $routes->get('addseminar', 'Auth::addseminar', ['filter' => 'session']);
    $routes->get('editseminar/(:num)', 'Auth::editseminar/$1', ['filter' => 'session']);
    $routes->post('removeseminar/(:num)', 'Auth::removeseminar/$1', ['filter' => 'session']);

    // Webbinar
    $routes->get('webbinar', 'Auth::webbinar', ['filter' => 'session']);
    $routes->get('addwebbinar', 'Auth::addwebbinar', ['filter' => 'session']);
    $routes->get('editwebbinar/(:num)', 'Auth::editwebbinar/$1', ['filter' => 'session']);

    // Diklat
    $routes->get('diklat', 'Auth::diklat', ['filter' => 'session']);
    $routes->get('adddiklat', 'Auth::adddiklat', ['filter' => 'session']);
    $routes->get('editdiklat/(:num)', 'Auth::editdiklat/$1', ['filter' => 'session']);
    $routes->post('removediklat/(:num)', 'Auth::removediklat/$1', ['filter' => 'session']);

    // Jadwal
    $routes->get('jadwal', 'Auth::jadwal', ['filter' => 'session']);
    $routes->get('addjadwal', 'Auth::addjadwal', ['filter' => 'session']);
    $routes->get('editjadwal/(:num)', 'Auth::editjadwal/$1', ['filter' => 'session']);
    $routes->post('removejadwal/(:num)', 'Auth::removejadwal/$1', ['filter' => 'session']);

    // Foto
    $routes->get('foto', 'Auth::foto', ['filter' => 'session']);
    $routes->get('addfoto', 'Auth::addfoto', ['filter' => 'session']);
    $routes->get('editfoto/(:num)', 'Auth::editfoto/$1', ['filter' => 'session']);
    $routes->post('removefoto/(:num)', 'Auth::removefoto/$1', ['filter' => 'session']);

    // Video
    $routes->get('video', 'Auth::video', ['filter' => 'session']);
    $routes->get('addvideo', 'Auth::addvideo', ['filter' => 'session']);
    $routes->get('editvideo/(:num)', 'Auth::editvideo/$1', ['filter' => 'session']);
    $routes->post('removevideo/(:num)', 'Auth::removevideo/$1', ['filter' => 'session']);

    // Slideshow
    $routes->get('slideshow', 'Auth::slideshow',['filter' => 'session']);
    $routes->get('addslideshow', 'Auth::addslideshow', ['filter' => 'session']);
    $routes->get('editslideshow/(:num)', 'Auth::editslideshow/$1', ['filter' => 'session']);
    $routes->post('removeslideshow/(:num)', 'Auth::removeslideshow/$1', ['filter' => 'session']);

    // Status pengaduan dan permohonan
    $routes->post('pengaduan/(:num)', 'Auth::pengaduan/$1', ['filter' => 'session']);
    $routes->post('permohonan/(:num)', 'Auth::permohonan/$1', ['filter' => 'session']);

});

// Uploads
$routes->group('upload', static function ($routes){
    service('auth')->routes($routes);
    $routes->post('foto', 'Upload::foto', ['filter => session']);
    $routes->post('fotoberita', 'Upload::fotoberita', ['filter => session']);
    $routes->post('fotoseminar', 'Upload::fotoseminar', ['filter => session']);
    $routes->post('fotodiklat', 'Upload::fotodiklat', ['filter => session']);
    $routes->post('fotojadwal', 'Upload::fotojadwal', ['filter => session']);
    $routes->post('fotogaleri', 'Upload::fotogaleri', ['filter => session']);
    $routes->post('videogaleri', 'Upload::videogaleri', ['filter => session']);
    $routes->post('fotoslideshow', 'Upload::fotoslideshow', ['filter => session']);
    $routes->post('pdf', 'Upload::pdf', ['filter => session']);
});

// Add
$routes->group('add', static function ($routes){
    service('auth')->routes($routes);
    $routes->post('users', 'Upload::addusers', ['filter => session']);
    $routes->post('artista', 'Upload::addartista', ['filter => session']);
    $routes->post('berita', 'Upload::addberita', ['filter => session']);
    $routes->post('seminar', 'Upload::addseminar', ['filter => session']);
    $routes->post('webbinar', 'Upload::addwebbinar', ['filter => session']);
    $routes->post('diklat', 'Upload::adddiklat', ['filter => session']);
    $routes->post('jadwal', 'Upload::addjadwal', ['filter => session']);
    $routes->post('slideshow', 'Upload::addslideshow', ['filter => session']);
    $routes->post('foto', 'Upload::addfoto', ['filter => session']);
    $routes->post('fotogaleri', 'Upload::addfotogaleri', ['filter => session']);
    $routes->post('videogaleri', 'Upload::addvideogaleri', ['filter => session']);
});

// Update
$routes->group('save', static function ($routes){
    service('auth')->routes($routes);
    $routes->post('users/(:num)', 'Upload::editusers/$1', ['filter => session']);
    $routes->post('artista/(:num)', 'Upload::artista/$1', ['filter => session']);
    $routes->post('berita/(:num)', 'Upload::editberita/$1', ['filter => session']);
    $routes->post('seminar/(:num)', 'Upload::editseminar/$1', ['filter => session']);
    $routes->post('webbinar/(:num)', 'Upload::editwebbinar/$1', ['filter => session']);
    $routes->post('diklat/(:num)', 'Upload::editdiklat/$1', ['filter => session']);
    $routes->post('jadwal/(:num)', 'Upload::editjadwal/$1', ['filter => session']);
    $routes->post('slideshow/(:num)', 'Upload::editslideshow/$1', ['filter => session']);
    $routes->post('fotogaleri/(:num)', 'Upload::editfotogaleri/$1', ['filter => session']);
    $routes->post('videogaleri/(:num)', 'Upload::editvideogaleri/$1', ['filter => session']);
});

//  Home
$routes->group('/', static function ($routes) {
    $routes->get('', 'Home::index');
    $routes->get('migration', 'Home::migration');
    $routes->get('movedata', 'Home::movedata');
    $routes->get('reconfseminarwebinar', 'Home::reconfseminarwebinar');
    $routes->get('reconfdata', 'Home::reconfdata');
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

// Gallery
$routes->group('galeri', static function ($routes) {
    $routes->get('foto', 'Gallery::indexphoto');
    $routes->get('video', 'Gallery::indexvideo');
    $routes->get('video/(:num)', 'Gallery::playvideo/$1');
});

// Profile
$routes->group('profil', static function ($routes) {
    $routes->get('', 'Profile::index');
});

// Artista
$routes->group('publikasi', static function ($routes) {
    $routes->get('artista', 'Artista::index');
    // $routes->get('news', 'Artista::index');
    $routes->get('artista/(:any)', 'Artista::article/$1');
});

// Layanan
$routes->group('layanan', static function ($routes) {
    $routes->get('standarpelayanan', 'Layanan::standarpelayanan');
    $routes->get('formulirpermohonan', 'Layanan::indexpermohonan');
    $routes->post('permohonaninformasi', 'Layanan::formpermohonan');
});

// Pengaduan
$routes->group('pengaduan', static function ($routes) {
    $routes->get('formulirpengaduan', 'Pengaduan::indexpengaduan');
    $routes->post('pengaduanmasyarakat', 'Pengaduan::formaduan');
});

// Infomrasi Kegiatan
$routes->group('informasi', static function ($routes) {
    $routes->get('seminarwebinar', 'Seminar::index');
    $routes->get('seminarwebinar/(:any)', 'Seminar::article/$1');
    $routes->get('diklat', 'Diklat::indexregistration');
    $routes->get('diklat/(:any)', 'Diklat::diklatregistration/$1');
});