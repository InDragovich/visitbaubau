<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Route Frontend
$routes->get('/', 'Home::index');
$routes->get('view/login', 'View::login');
$routes->get('view/register', 'View::register');
$routes->get('/wisata/(:segment)', 'Home::index');

// Login/out
// $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);

// View Wisata
$routes->get('/view/wisata', 'View::wisata');
$routes->post('/view/wisata/cari/', 'Wisata::cari');

//View Artikel
$routes->get('/view/artikel', 'View::artikel');
$routes->get('view/artikel/(:segment)', 'View::detailartikel/$1');
$routes->post('view/artikel/detailartikel/komentar/save', 'Komentar::save');

//View Event
$routes->get('/view/event', 'View::event');
$routes->get('view/detailevent/(:segment)', 'View::detailevent/$1');
$routes->post('/view/pengajuanevent/create-event', 'View::savepengajuan');

// View Visi Misi
$routes->get('/view/visimisi', 'View::visimisi');

// View Struktur organisasi
$routes->get('/view/strukturorganisasi', 'View::strukturorganisasi');

// View Marketplace
$routes->get('/view/marketplace', 'View::marketplace');
$routes->get('/view/marketplace/detailproduk/(:segment)', 'View::detailproduk/$1');
$routes->get('/view/profil/(:num)', 'View::profil/$1');
$routes->get('/view/marketplace/katalog/', 'View::katalog');
$routes->post('/view/marketplace/katalog', 'View::katalog');
$routes->post('/view/marketplace/cari/', 'Produk::cari');

//Routes Admin
// Filtering akses agar hanya admin yang bisa masuk
$routes->get('/admin', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/user_list', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/create-user', 'Admin::create', ['filter' => 'role:admin']);
$routes->post('/admin/save', 'Admin::save', ['filter' => 'role:admin']);
$routes->get('/admin/profil', 'Admin::profil', ['filter' => 'role:admin']);
$routes->get('/admin/edit', 'Admin::edit', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/activate', 'Admin::activate', ['filter' => 'role:admin']);
$routes->get('admin/set_password/(:num)', 'Admin::index/$1', ['filter' => 'role:admin']);

// Kelola Wisata
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/wisata', 'Wisata::index', ['filter' => 'role:admin']);
$routes->get('/admin/wisata/create', 'Wisata::create', ['filter' => 'role:admin']);
$routes->delete('/admin/wisata/(:num)', 'Wisata::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/wisata/detail-wisata/(:segment)', 'Wisata::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/wisata/create-wisata', 'Wisata::save', ['filter' => 'role:admin']);
$routes->get('/admin/wisata/edit-wisata/(:segment)', 'Wisata::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/wisata/edit-wisata/(:num)', 'Wisata::update/$1', ['filter' => 'role:admin']);
$routes->get('c/(:any)', 'Wisata/kategori/$1') ;

// Kelola Kateogri Wisata
$routes->get('/admin/kategoriwisata', 'KategoriWisata::index', ['filter' => 'role:admin']);
$routes->get('/admin/kategoriwisata/create', 'KategoriWisata::create', ['filter' => 'role:admin']);
$routes->delete('/admin/kategoriwisata/(:num)', 'KategoriWisata::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kategoriwisata/detail-kategori-wisata/(:segment)', 'KategoriWisata::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kategoriwisata/create-kategori-wisata', 'KategoriWisata::save', ['filter' => 'role:admin']);
$routes->get('/admin/kategoriwisata/edit-kategori-wisata/(:segment)', 'KategoriWisata::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kategoriwisata/edit-kategori-wisata/(:num)', 'KategoriWisata::update/$1', ['filter' => 'role:admin']);

// Kelola Kateogri Event
$routes->get('/admin/kategorievent', 'KategoriEvent::index', ['filter' => 'role:admin']);
$routes->get('/admin/kategorievent/create', 'KategoriEvent::create', ['filter' => 'role:admin']);
$routes->delete('/admin/kategorievent/(:num)', 'KategoriEvent::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kategorievent/detail-kategori-event/(:segment)', 'KategoriEvent::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kategorievent/create-kategori-event', 'KategoriEvent::save', ['filter' => 'role:admin']);
$routes->get('/admin/kategorievent/edit-kategori-event/(:segment)', 'KategoriEvent::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kategorievent/edit-kategori-event/(:num)', 'KategoriEvent::update/$1', ['filter' => 'role:admin']);

// Kelola Artikel
$routes->get('/admin/artikel', 'Artikel::index', ['filter' => 'role:admin']);
$routes->get('/admin/artikel/create', 'Artikel::create', ['filter' => 'role:admin']);
$routes->delete('/admin/artikel/(:num)', 'Artikel::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/artikel/detail-artikel/(:segment)', 'Artikel::detail/$1');
$routes->post('/admin/artikel/create-artikel', 'Artikel::save', ['filter' => 'role:admin']);
$routes->get('/admin/artikel/edit-artikel/(:segment)', 'Artikel::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/artikel/edit-artikel/(:num)', 'Artikel::update/$1', ['filter' => 'role:admin']);

// Kelola Event
$routes->get('/admin/event', 'Event::index', ['filter' => 'role:admin']);
$routes->get('/admin/event/create', 'Event::create', ['filter' => 'role:admin']);
$routes->delete('/admin/event/(:num)', 'Event::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/event/detail-event/(:segment)', 'Event::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/event/create-event', 'Event::save', ['filter' => 'role:admin']);
$routes->get('/admin/event/edit-event/(:segment)', 'Event::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/event/edit-event/(:num)', 'Event::update/$1', ['filter' => 'role:admin']);
$routes->post('/admin/event/verifikasi/(:segment)', 'Event::verifikasi/$1', ['filter' => 'role:admin']);

$routes->get('/wisata', 'Home::index');
$routes->get('/event', 'Home::index');
$routes->get('/artikel', 'Home::index');
$routes->get('/kategori', 'Home::index');


// Routes User
$routes->get('/user', 'User::index', ['filter' => 'role:penjual, admin']);
// $routes->get('/user/produk', 'User::viewProduk');
// $routes->get('/user/produk/create', 'User::create');
$routes->get('/user/profil', 'User::index', ['filter' => 'role:admin, penjual']);
$routes->get('/user/edit-profil', 'User::editProfil', ['filter' => 'role:admin, penjual']);
$routes->post('/user/edit-profil/(:num)', 'User::save/$1', ['filter' => 'role:admin, penjual']);
$routes->get('/user/produk/edit', 'User::edit', ['filter' => 'role:admin, penjual']);
$routes->get('/user/dashboard', 'User::dashboard', ['filter' => 'role:admin, penjual']);

$routes->get('/user/produk', 'Produk::index', ['filter' => 'role:admin, penjual']);
$routes->get('/user/produk/create', 'Produk::create', ['filter' => 'role:admin, penjual']);
$routes->delete('/user/produk/(:num)', 'Produk::delete/$1', ['filter' => 'role:admin, penjual']);
$routes->get('/user/produk/detail-produk/(:segment)', 'Produk::detail/$1', ['filter' => 'role:admin, penjual']);
$routes->post('/user/produk/create-produk', 'Produk::save', ['filter' => 'role:admin, penjual']);
$routes->get('/user/produk/edit-produk/(:segment)', 'Produk::edit/$1', ['filter' => 'role:admin, penjual']);
$routes->post('/user/produk/edit-produk/(:num)', 'Produk::update/$1', ['filter' => 'role:admin, penjual']);
$routes->post('/user/update/(:num)', 'User::update/$1', ['filter' => 'role:admin, penjual']);

$routes->get('/user/media', 'User::media', ['filter' => 'role:penjual']);
$routes->get('/user/media/create', 'Media::create', ['filter' => 'role:penjual']);
$routes->get('/user/media/edit-media/(:num)', 'Media::edit/$1', ['filter' => 'role:penjual']);


// $routes->post('/Home/(:any)', 'Home::user');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}