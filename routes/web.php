<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Route::get('/', 'UserController@mainetalase2');
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
*/
//USER
Route::get('/', 'UserController@mainpage');
Route::get('home', ['as' => 'home', 'uses' => 'UserController@mainpage']);
Route::get('premiumall', 'UserController@tampilpremium');
Route::get('regularall', 'UserController@tampilregular');
Route::get('aksicarikategoriproduk', 'UserController@aksicarikategori');


Route::get('/product/{id}', 'UserController@productpage');
Route::put('/aksitambahkeranjang', 'UserController@tambahkeranjangaksi');
//Route::get('keranjang', 'UserController@keranjang');
Route::get('keranjang', ['as' => 'keranjang', 'uses' => 'UserController@keranjang']);
Route::delete('/hapuskeranjang/{id}', 'UserController@hapuskeranjang');
Route::get('tambahpembeli', 'UserController@tambahpembeli');
Route::put('/aksitambahpembeli', 'UserController@tambahpembeliaksi');
//Route::get('aturtransaksi', 'UserController@aturtransaksi');
Route::get('aturtransaksi', ['as' => 'aturtransaksi', 'uses' => 'UserController@aturtransaksi']);
Route::get('editinformasipembeli', 'UserController@editinformasipembeli');
Route::put('/aksieditpembeli', 'UserController@editpembeliaksi');
Route::get('selesai', 'UserController@selesai');

Route::put('aksicarikategoriproduk', 'UserController@aksicarikategori');
Route::put('aksicariclogproduk', 'UserController@aksicariclog');
Route::get('aksicariclogproduk', 'UserController@mainpage');

Route::get('tampilukuran', ['as' => 'tampilukuran', 'uses' => 'UserController@tampilukuran']);

Route::get('tampilongkir', ['as' => 'tampilongkir', 'uses' => 'UserController@tampilongkir']);

//test Telegram
Route::get('getUpdates', 'AdminController@getUpdates');
//ADMIN
Route::get('/loginadmin', function () {
    return view('admin/login');
});

Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@admin']);
Route::put('/aksilogin', 'AdminController@loginaksi');
Route::get('/aksilogout', 'AdminController@logoutaksi');

Route::get('tutuptoko', 'AdminController@tutuptoko');
Route::get('bukatoko', 'AdminController@bukatoko');

Route::get('lupapassword', 'AdminController@lupapassword');
Route::get('aturkarenalupapassword128321383283120983218481481842842184198241818454675161273273273287287', 'AdminController@aturkarenalupapassword');
Route::put('aksieditadminlupa/{id}', 'AdminController@editadminaksilupa');
/*
Route::get('/aturadmin', function () {
    return view('admin/aturadmin');
});
*/

Route::get('/aturpesanan', 'AdminController@aturpesanan');
Route::put('/aksicaripesanan', 'AdminController@aksicaripesanan');
Route::get('/aksicaripesanan', 'AdminController@aturpesanan');
Route::get('/prosespesanan/{id}', 'AdminController@prosespesanan');
Route::get('/kirimpesanan/{id}', 'AdminController@kirimpesanan');
Route::get('/hapuspesanan/{id}', 'AdminController@hapuspesanan');
//URUSAN ADMIN
Route::get('/aturadmin', 'AdminController@aturadmin');
//ADMIN EDIT
Route::get('/editadmin/{id}', 'AdminController@editadmin');
Route::put('/aksieditadmin/{id}', 'AdminController@editadminaksi');
//ADMIN INSERT
Route::get('/tambahadmin', function () {
    return view('admin/tambahadmin');
});
Route::put('/aksitambah', 'AdminController@tambahadminaksi');
//ADMIN DELETE
Route::delete('/hapusadmin/{id}', 'AdminController@deleteadminaksi');

//ADMINE SELESAI

//URUSAN CLOG
Route::get('/aturclog', 'AdminController@aturclog');
//ADMIN EDIT
Route::get('/editclog/{id}', 'AdminController@editclog');
Route::put('/aksieditclog/{id}', 'AdminController@editclogaksi');
//ADMIN INSERT
Route::get('/tambahclog', 'AdminController@carikategoriclog');

Route::put('/aksitambahclog', 'AdminController@tambahclogaksi');
//ADMIN DELETE
Route::delete('/hapusclog/{id}', 'AdminController@deleteclogaksi');
Route::put('/aksicariclog', 'AdminController@cariclogaksi');
Route::get('/aksicariclog', 'AdminController@aturclog');
//});
//CLOG SELESAI

//URUSAN ADMIN
Route::get('/aturwarna', 'AdminController@aturwarna');
//ADMIN EDIT
Route::get('/editwarna/{id}', 'AdminController@editwarna');
Route::put('/aksieditwarna/{id}', 'AdminController@editwarnaaksi');
//ADMIN INSERT
Route::get('/tambahwarna', function () {
    return view('admin/tambahwarna');
});
Route::put('/aksitambahwarna', 'AdminController@tambahwarnaaksi');
//ADMIN DELETE
Route::delete('/hapuswarna/{id}', 'AdminController@deletewarnaaksi');
Route::put('/aksicariwarna', 'AdminController@cariwarnaaksi');
Route::get('/aksicariwarna', 'AdminController@aturwarna');

//ADMINE SELESAI



//URUSAN GAMBAR
Route::get('/aturgambar', 'AdminController@aturgambar');
Route::get('/carivaluegambar', 'AdminController@carivaluegambar');
Route::put('/aksitambahgambar', 'AdminController@tambahgambaraksi');
Route::delete('/hapusgambar/{id}', 'AdminController@deletegambaraksi');
Route::put('/editgambar/{id}', 'AdminController@editgambar');
Route::put('/aksicarigambar', 'AdminController@carigambaraksi');
Route::get('/aksicarigambar', 'AdminController@aturgambar');
//GAMBAR SELESAI

//URUSAN UKURAN
Route::get('/aturukuran', 'AdminController@aturukuran');
//ADMIN EDIT
Route::get('/editukuran/{id}', 'AdminController@editukuran');
Route::put('/aksieditukuran/{id}', 'AdminController@editukuranaksi');
//ADMIN INSERT
Route::get('/tambahukuran', function () {
    return view('admin/tambahukuran');
});
Route::put('/aksitambahukuran', 'AdminController@tambahukuranaksi');
//ADMIN DELETE
Route::delete('/hapusukuran/{id}', 'AdminController@deleteukuranaksi');

//UKURAN SELESAI

//URUSAN kategori
Route::get('/aturkategori', 'AdminController@aturkategori');
//ADMIN EDIT
Route::get('/editkategori/{id}', 'AdminController@editkategori');
Route::put('/aksieditkategori/{id}', 'AdminController@editkategoriaksi');
//ADMIN INSERT
Route::get('/tambahkategori', function () {
    return view('admin/tambahkategori');
});
Route::put('/aksitambahkategori', 'AdminController@tambahkategoriaksi');
//ADMIN DELETE
Route::delete('/hapuskategori/{id}', 'AdminController@deletekategoriaksi');

//kategori SELESAI


//URUSAN Diskon
Route::get('/aturdiskon', 'AdminController@aturdiskon');
Route::get('/editdiskon/{id}', 'AdminController@editdiskon');
Route::put('/aksieditdiskon/{id}', 'AdminController@editdiskonaksi');
Route::put('/aksicaridiskon', 'AdminController@caridiskonaksi');
Route::get('/aksicaridiskon', 'AdminController@aturdiskon');

//URUSAN ongkir
Route::get('/aturongkir', 'AdminController@aturongkir');
//ADMIN EDIT
Route::get('/editongkir/{id}', 'AdminController@editongkir');
Route::put('/aksieditongkir/{id}', 'AdminController@editongkiraksi');
//ADMIN INSERT
Route::get('/tambahongkir', function () {
    return view('admin/tambahongkir');
});
Route::put('/aksitambahongkir', 'AdminController@tambahongkiraksi');
//ADMIN DELETE
Route::delete('/hapusongkir/{id}', 'AdminController@deleteongkiraksi');
Route::put('/aksicariongkir', 'AdminController@cariongkiraksi');
Route::get('/aksicariongkir', 'AdminController@aturongkir');
Route::get('/ongkirnaik', 'AdminController@aksiongkirnaik');
Route::get('/ongkirturun', 'AdminController@aksiongkirturun');


//ongkir SELESAI

//URUSAN lokasi
Route::get('/aturlokasi', 'AdminController@aturlokasi');
//ADMIN EDIT
Route::get('/editlokasi/{id}', 'AdminController@editlokasi');
Route::put('/aksieditlokasi/{id}', 'AdminController@editlokasiaksi');
//ADMIN INSERT
Route::get('/tambahlokasi', function () {
    return view('admin/tambahlokasi');
});
Route::put('/aksitambahlokasi', 'AdminController@tambahlokasiaksi');
//ADMIN DELETE
Route::delete('/hapuslokasi/{id}', 'AdminController@deletelokasiaksi');
Route::put('/aksicarilokasi', 'AdminController@carilokasiaksi');
Route::get('/aksicarilokasi', 'AdminController@aturlokasi');

Route::get('/aturbanner', 'AdminController@aturbanner');
Route::get('/tambahbanner', function () {
    return view('admin/tambahbanner');
    });
Route::put('/aksitambahbanner', 'AdminController@tambahbanneraksi');
Route::delete('/hapusbanner/{id}', 'AdminController@deletebanneraksi');
