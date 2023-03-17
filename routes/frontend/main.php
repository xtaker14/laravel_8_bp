<?php
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Login
// Route::get('login', 'App\Http\Controllers\Frontend\Login@index');
// Route::post('login/check', 'App\Http\Controllers\Frontend\Login@check');
// Route::get('login/lupa', 'App\Http\Controllers\Frontend\Login@lupa');
// Route::get('login/logout', 'App\Http\Controllers\Frontend\Login@logout');

// Akreditasi
// Route::get('provider-akreditasi', 'App\Http\Controllers\Frontend\Akreditasi@index');
// Route::get('akreditasi/read/{par1}', 'App\Http\Controllers\Frontend\Akreditasi@read');
// Route::get('layanan/{par1}', 'App\Http\Controllers\Frontend\Akreditasi@layanan');
// Route::get('akreditasi/kategori/{par1}', 'App\Http\Controllers\Frontend\Akreditasi@kategori');

// Proyek
// Route::get('proyek', 'App\Http\Controllers\Frontend\Proyek@index');
// Route::get('proyek/kategori/{par1}', 'App\Http\Controllers\Frontend\Proyek@kategori');
// Route::get('proyek/detail/{par1}', 'App\Http\Controllers\Frontend\Proyek@detail');
// Route::get('proyek/cetak/{par1}', 'App\Http\Controllers\Frontend\Proyek@cetak');

/* FRONT END */
// Home
// Route::get('/', 'App\Http\Controllers\Frontend\Home@index');
Route::get('/', ['App\Http\Controllers\Frontend\Home', 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });
Route::get('home', 'App\Http\Controllers\Frontend\Home@index');
Route::get('pemesanan', 'App\Http\Controllers\Frontend\Home@pemesanan');
Route::get('konfirmasi', 'App\Http\Controllers\Frontend\Home@konfirmasi');
Route::get('pembayaran', 'App\Http\Controllers\Frontend\Home@pembayaran');
Route::post('proses_pemesanan', 'App\Http\Controllers\Frontend\Home@proses_pemesanan');
Route::get('berhasil/{par1}', 'App\Http\Controllers\Frontend\Home@berhasil');
Route::get('cetak/{par1}', 'App\Http\Controllers\Frontend\Home@cetak');
Route::get('tentang_kami', 'App\Http\Controllers\Frontend\Home@tentang_kami');
Route::get('aksi', 'App\Http\Controllers\Frontend\Aksi@index');
Route::get('aksi/status/{par1}', 'App\Http\Controllers\Frontend\Aksi@status');
// kontak
Route::group([
    'prefix' => 'kontak',
    'as' => 'kontak.',
], function () {
    Route::get('/', ['App\Http\Controllers\Frontend\Kontak', 'kontak'])
        ->name('index'); 
        
    Route::post('send_email', 'App\Http\Controllers\Frontend\Kontak@send_email')
        ->name('send_email')
        ->middleware('mail_config'); 
});
// Subscribers
Route::post('subscribers/proses', 'App\Http\Controllers\Frontend\Subscribers@process');
// Layanan
Route::get('layanan/{par1}', 'App\Http\Controllers\Frontend\Berita@layanan');
// Berita
Route::group([
    'prefix' => 'berita',
    'as' => 'berita.',
], function () {
    Route::get('/', ['App\Http\Controllers\Frontend\Berita', 'index'])
        ->name('index');

    Route::get('read/{par1}', ['App\Http\Controllers\Frontend\Berita', 'read'])
        ->name('read');
    Route::get('terjadi/{par1}', ['App\Http\Controllers\Frontend\Berita', 'terjadi'])
        ->name('terjadi');
    Route::get('kategori/{par1}', ['App\Http\Controllers\Frontend\Berita', 'kategori'])
        ->name('kategori'); 
});
// Agenda
Route::get('agenda', 'App\Http\Controllers\Frontend\Agenda@index');
Route::get('agenda/read/{par1}', 'App\Http\Controllers\Frontend\Agenda@read');
Route::get('agenda/kategori/{par1}', 'App\Http\Controllers\Frontend\Agenda@kategori');
// download
Route::get('download', 'App\Http\Controllers\Frontend\Download@index');
Route::get('download/unduh/{par1}', 'App\Http\Controllers\Frontend\Download@unduh');
Route::get('download/kategori/{par1}', 'App\Http\Controllers\Frontend\Download@kategori');
Route::get('dokumen', 'App\Http\Controllers\Frontend\Download@index');
Route::get('dokumen/unduh/{par1}', 'App\Http\Controllers\Frontend\Download@unduh');
Route::get('dokumen/detail/{par1}/{par2}', 'App\Http\Controllers\Frontend\Download@detail');
Route::get('download/detail/{par1}/{par2}', 'App\Http\Controllers\Frontend\Download@detail');
// galeri
Route::get('galeri', 'App\Http\Controllers\Frontend\Galeri@index');
Route::get('galeri/detail/{par1}', 'App\Http\Controllers\Frontend\Galeri@detail');
// video
Route::get('video', 'App\Http\Controllers\Frontend\Video@index');
Route::get('video/detail/{par1}', 'App\Http\Controllers\Frontend\Video@detail');
// Route::get('webinar', 'App\Http\Controllers\Frontend\Video@index');
// Route::get('webinar/detail/{par1}/{par2}', 'App\Http\Controllers\Frontend\Video@detail');
/* END FRONT END */