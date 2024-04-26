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
$routes->get('errors', '\App\Controllers\Auth::errors');


// Dasboard
$routes->group('dashboard', static function ($routes) {
    service('auth')->routes($routes);

    // Dashboard
    $routes->get('', 'Auth::dashboard', ['filter' => 'group:superadmin,admin',]);
    
    // Akun
    $routes->get('editakun', 'Auth::akun', ['filter' => 'group:superadmin,admin',]);

    // Users
    $routes->get('users', 'Auth::users', ['filter' => 'group:superadmin', 'permission:users.manage-admins']);
    $routes->get('addusers', 'Auth::addusers', ['filter' => 'group:superadmin', 'permission:users.manage-admins']);
    $routes->get('editusers/(:num)', 'Auth::editusers/$1', ['filter' => 'group:superadmin', 'permission:users.manage-admins']);

    // Berita
    $routes->get('berita', 'Auth::berita', ['filter' => 'group:superadmin,admin',]);
    $routes->get('addberita', 'Auth::addberita', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editberita/(:num)', 'Auth::editberita/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removeberita/(:num)', 'Auth::removeberita/$1', ['filter' => 'group:superadmin,admin',]);

    // Artista
    $routes->get('artista', 'Auth::artista', ['filter' => 'group:superadmin,admin',]);
    $routes->get('addartista', 'Auth::addartista', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editartista/(:num)', 'Auth::editartista/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removeartista/(:num)', 'Auth::removeartista/$1', ['filter' => 'group:superadmin,admin',]);

    // Seminar
    $routes->get('seminar', 'Auth::seminar', ['filter' => 'group:superadmin,admin',]);
    $routes->get('addseminar', 'Auth::addseminar', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editseminar/(:num)', 'Auth::editseminar/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removeseminar/(:num)', 'Auth::removeseminar/$1', ['filter' => 'group:superadmin,admin',]);

    // Webbinar
    $routes->get('webbinar', 'Auth::webbinar', ['filter' => 'group:superadmin,admin',]);
    $routes->get('addwebbinar', 'Auth::addwebbinar', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editwebbinar/(:num)', 'Auth::editwebbinar/$1', ['filter' => 'group:superadmin,admin',]);

    // Diklat
    $routes->get('diklat', 'Auth::diklat', ['filter' => 'group:superadmin,admin',]);
    $routes->get('adddiklat', 'Auth::adddiklat', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editdiklat/(:num)', 'Auth::editdiklat/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removediklat/(:num)', 'Auth::removediklat/$1', ['filter' => 'group:superadmin,admin',]);

    // Jadwal
    $routes->get('jadwal', 'Auth::jadwal', ['filter' => 'group:superadmin,admin',]);
    $routes->get('addjadwal', 'Auth::addjadwal', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editjadwal/(:num)', 'Auth::editjadwal/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removejadwal/(:num)', 'Auth::removejadwal/$1', ['filter' => 'group:superadmin,admin',]);

    // Foto
    $routes->get('foto', 'Auth::foto', ['filter' => 'group:superadmin,admin',]);
    $routes->get('addfoto', 'Auth::addfoto', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editfoto/(:num)', 'Auth::editfoto/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removefoto/(:num)', 'Auth::removefoto/$1', ['filter' => 'group:superadmin,admin',]);

    // Video
    $routes->get('video', 'Auth::video', ['filter' => 'group:superadmin,admin',]);
    $routes->get('addvideo', 'Auth::addvideo', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editvideo/(:num)', 'Auth::editvideo/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removevideo/(:num)', 'Auth::removevideo/$1', ['filter' => 'group:superadmin,admin',]);

    // Slideshow
    $routes->get('slideshow', 'Auth::slideshow',['filter' => 'group:superadmin,admin',]);
    $routes->get('addslideshow', 'Auth::addslideshow', ['filter' => 'group:superadmin,admin',]);
    $routes->get('editslideshow/(:num)', 'Auth::editslideshow/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removeslideshow/(:num)', 'Auth::removeslideshow/$1', ['filter' => 'group:superadmin,admin',]);

    // Status pengaduan dan permohonan
    $routes->post('pengaduan/(:num)', 'Auth::pengaduan/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('permohonan/(:num)', 'Auth::permohonan/$1', ['filter' => 'group:superadmin,admin',]);

});

// Uploads
$routes->group('upload', static function ($routes){
    service('auth')->routes($routes);
    $routes->post('tinymce', 'Upload::fototinymce', ['filter' => 'group:superadmin,admin',]);
    $routes->post('foto', 'Upload::foto', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removefoto', 'Upload::removefoto', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotoberita', 'Upload::fotoberita', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removefotoberita', 'Upload::removefotoberita', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotoseminar', 'Upload::fotoseminar', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotodiklat', 'Upload::fotodiklat', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotojadwal', 'Upload::fotojadwal', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotogaleri', 'Upload::fotogaleri', ['filter' => 'group:superadmin,admin',]);
    $routes->post('videogaleri', 'Upload::videogaleri', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotoslideshow', 'Upload::fotoslideshow', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removeslideshow', 'Upload::removeslideshow', ['filter' => 'group:superadmin,admin',]);
    $routes->post('pdf', 'Upload::pdf', ['filter' => 'group:superadmin,admin',]);
    $routes->post('removefile', 'Upload::removepdf', ['filter' => 'group:superadmin,admin',]);
});

// Add
$routes->group('add', static function ($routes){
    service('auth')->routes($routes);
    $routes->post('users', 'Upload::addusers', ['filter' => 'group:superadmin', 'permission:users.manage-admins']);
    $routes->post('artista', 'Upload::addartista', ['filter' => 'group:superadmin,admin',]);
    $routes->post('berita', 'Upload::addberita', ['filter' => 'group:superadmin,admin',]);
    $routes->post('seminar', 'Upload::addseminar', ['filter' => 'group:superadmin,admin',]);
    $routes->post('webbinar', 'Upload::addwebbinar', ['filter' => 'group:superadmin,admin',]);
    $routes->post('diklat', 'Upload::adddiklat', ['filter' => 'group:superadmin,admin',]);
    $routes->post('jadwal', 'Upload::addjadwal', ['filter' => 'group:superadmin,admin',]);
    $routes->post('slideshow', 'Upload::addslideshow', ['filter' => 'group:superadmin,admin',]);
    $routes->post('foto', 'Upload::addfoto', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotogaleri', 'Upload::addfotogaleri', ['filter' => 'group:superadmin,admin',]);
    $routes->post('videogaleri', 'Upload::addvideogaleri', ['filter' => 'group:superadmin,admin',]);
});

// Update
$routes->group('save', static function ($routes){
    service('auth')->routes($routes);
    $routes->post('akun', 'Upload::akun', ['filter' => 'group:superadmin,admin',]);
    $routes->post('users/(:num)', 'Upload::editusers/$1', ['filter' => 'group:superadmin', 'permission:users.manage-admins']);
    $routes->post('artista/(:num)', 'Upload::artista/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('berita/(:num)', 'Upload::editberita/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('seminar/(:num)', 'Upload::editseminar/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('webbinar/(:num)', 'Upload::editwebbinar/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('diklat/(:num)', 'Upload::editdiklat/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('jadwal/(:num)', 'Upload::editjadwal/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('slideshow/(:num)', 'Upload::editslideshow/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('fotogaleri/(:num)', 'Upload::editfotogaleri/$1', ['filter' => 'group:superadmin,admin',]);
    $routes->post('videogaleri/(:num)', 'Upload::editvideogaleri/$1', ['filter' => 'group:superadmin,admin',]);
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