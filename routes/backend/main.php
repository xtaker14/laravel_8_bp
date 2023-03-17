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

/* BACK END */

// dasbor
// Route::get('admin/dasbor', 'App\Http\Controllers\Backend\Dasbor@index');
// Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Backend\Dasbor@konfigurasi');

// user
// Route::get('admin/user', 'App\Http\Controllers\Backend\User@index');
// Route::post('admin/user/tambah', 'App\Http\Controllers\Backend\User@tambah');
// Route::get('admin/user/edit/{par1}', 'App\Http\Controllers\Backend\User@edit');
// Route::post('admin/user/proses_edit', 'App\Http\Controllers\Backend\User@proses_edit');
// Route::get('admin/user/delete/{par1}', 'App\Http\Controllers\Backend\User@delete');
// Route::post('admin/user/proses', 'App\Http\Controllers\Backend\User@proses');

// pemesanan
// Route::group([
//     'prefix' => 'pemesanan',
//     'as' => 'pemesanan.',
//     'middleware' => 'role:'.config('boilerplate.access.role.admin'),
// ], function () {
//     Route::get('/', ['App\Http\Controllers\Backend\Pemesanan', 'index'])
//         ->name('index')
//         ->breadcrumbs(function (Trail $trail) {
//             $trail
//                 ->parent('admin.dashboard')
//                 ->push(__('Pemesanan'), route('admin.pemesanan'));
//         });

//     Route::get('tambah', ['App\Http\Controllers\Backend\Pemesanan', 'tambah'])
//         ->name('tambah')
//         ->breadcrumbs(function (Trail $trail) {
//             $trail->parent('admin.pemesanan.index')
//                 ->push(__('Tambah Pemesanan'), route('admin.pemesanan.tambah'));
//         });

//     Route::get('detail/{par1}', ['App\Http\Controllers\Backend\Pemesanan', 'detail'])
//         ->name('detail')
//         ->breadcrumbs(function (Trail $trail, $par1) {
//             $trail->parent('admin.pemesanan.index')
//                 ->push(__('Detail Pemesanan'), route('admin.pemesanan.detail', $par1));
//         });
        
//     Route::get('status_pemesanan/{par1}', ['App\Http\Controllers\Backend\Pemesanan', 'status_pemesanan'])
//         ->name('status_pemesanan')
//         ->breadcrumbs(function (Trail $trail, $par1) {
//             $trail->parent('admin.pemesanan.index')
//                 ->push(__('Status Pemesanan'), route('admin.pemesanan.status_pemesanan', $par1));
//         });
        
//     Route::get('cetak/{par1}', ['App\Http\Controllers\Backend\Pemesanan', 'cetak'])
//         ->name('cetak')
//         ->breadcrumbs(function (Trail $trail, $par1) {
//             $trail->parent('admin.pemesanan.index')
//                 ->push(__('Cetak Pemesanan'), route('admin.pemesanan.cetak', $par1)); 
//         });
        
//     Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Pemesanan', 'edit'])
//         ->name('edit')
//         ->breadcrumbs(function (Trail $trail, $par1) {
//             $trail->parent('admin.pemesanan.index')
//                 ->push(__('Edit Pemesanan'), route('admin.pemesanan.edit', $par1)); 
//         });

//     Route::get('filter/{par1}/{par2}/{par3}', ['App\Http\Controllers\Backend\Pemesanan', 'filter'])
//         ->name('filter')
//         ->breadcrumbs(function (Trail $trail, $par1, $par2, $par3) {
//             $trail->parent('admin.pemesanan.index')
//                 ->push(__('Filter Pemesanan'), route('admin.pemesanan.filter', $par1, $par2, $par3));
//         });

//     Route::get('cari', ['App\Http\Controllers\Backend\Pemesanan', 'cari'])
//         ->name('cari')
//         ->breadcrumbs(function (Trail $trail) {
//             $trail->parent('admin.pemesanan.index')
//                 ->push(__('Cari Pemesanan'), route('admin.pemesanan.cari'));
//         });

//     Route::post('proses', 'App\Http\Controllers\Backend\Pemesanan@proses')
//         ->name('proses');
//     Route::post('tambah_proses', 'App\Http\Controllers\Backend\Pemesanan@tambah_proses')
//         ->name('tambah_proses');
//     Route::post('edit_proses', 'App\Http\Controllers\Backend\Pemesanan@edit_proses')
//         ->name('edit_proses');
// });

// berita
Route::group([
    'prefix' => 'berita',
    'as' => 'berita.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Berita', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Berita'), route('admin.berita.index'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Berita', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.berita.index')
                ->push(__('Tambah Berita'), route('admin.berita.tambah'));
        });

    Route::get('status_berita/{par1}', ['App\Http\Controllers\Backend\Berita', 'status_berita'])
        ->name('status_berita')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.berita.index')
                ->push(__('Status Berita'), route('admin.berita.status_berita', $par1)); 
        });

    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Berita', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.berita.index')
                ->push(__('Kategori Berita'), route('admin.berita.kategori', $par1));
        });

    Route::get('jenis_berita/{par1}', ['App\Http\Controllers\Backend\Berita', 'jenis_berita'])
        ->name('jenis_berita')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.berita.index')
                ->push(__('Jenis Berita'), route('admin.berita.jenis_berita', $par1));
        });

    Route::get('author/{par1}', ['App\Http\Controllers\Backend\Berita', 'author'])
        ->name('author')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.berita.index')
                ->push(__('Author Berita'), route('admin.berita.author', $par1));
        }); 

    Route::get('cari', ['App\Http\Controllers\Backend\Berita', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.berita.index')
                ->push(__('Cari Berita'), route('admin.berita.cari'));
        });
    
    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Berita', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.berita.index')
                ->push(__('Edit Berita'), route('admin.berita.edit', $par1));
        });  

    Route::get('delete/{par1}/{par2}', ['App\Http\Controllers\Backend\Berita', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1, $par2) {
            $trail->parent('admin.berita.index')
                ->push(__('Delete Berita'), route('admin.berita.delete', $par1, $par2)); 
        }); 

    Route::get('add/{par1}/{par2}', ['App\Http\Controllers\Backend\Berita', 'add'])
        ->name('add')
        ->breadcrumbs(function (Trail $trail, $par1, $par2) {
            $trail->parent('admin.berita.index')
                ->push(__('Add Berita'), route('admin.berita.add', $par1, $par2)); 
        }); 
     
    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Berita@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Berita@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Berita@proses')
        ->name('proses'); 
});

// kategori
Route::group([
    'prefix' => 'kategori',
    'as' => 'kategori.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Kategori', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Kategori'), route('admin.kategori.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Kategori', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.kategori.index')
                ->push(__('Delete Kategori'), route('admin.kategori.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Kategori@tambah')
        ->name('tambah'); 
    Route::post('edit', 'App\Http\Controllers\Backend\Kategori@edit')
        ->name('edit'); 
});

// konfigurasi
Route::group([
    'prefix' => 'konfigurasi',
    'as' => 'konfigurasi.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', ['App\Http\Controllers\Backend\Konfigurasi', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Konfigurasi'), route('admin.konfigurasi.index'));
        });

    Route::get('logo', ['App\Http\Controllers\Backend\Konfigurasi', 'logo'])
        ->name('logo')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.konfigurasi.index')
                ->push(__('Logo Konfigurasi'), route('admin.konfigurasi.logo'));
        });

    Route::get('profil', ['App\Http\Controllers\Backend\Konfigurasi', 'profil'])
        ->name('profil')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.konfigurasi.index')
                ->push(__('Profil Konfigurasi'), route('admin.konfigurasi.profil'));
        });

    Route::get('icon', ['App\Http\Controllers\Backend\Konfigurasi', 'icon'])
        ->name('icon')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.konfigurasi.index')
                ->push(__('Icon Konfigurasi'), route('admin.konfigurasi.icon'));
        });

    Route::get('email', ['App\Http\Controllers\Backend\Konfigurasi', 'email'])
        ->name('email')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.konfigurasi.index')
                ->push(__('Email Konfigurasi'), route('admin.konfigurasi.email'));
        });

    Route::get('gambar', ['App\Http\Controllers\Backend\Konfigurasi', 'gambar'])
        ->name('gambar')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.konfigurasi.index')
                ->push(__('Gambar Konfigurasi'), route('admin.konfigurasi.gambar'));
        });

    Route::get('pembayaran', ['App\Http\Controllers\Backend\Konfigurasi', 'pembayaran'])
        ->name('pembayaran')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.konfigurasi.index')
                ->push(__('Pembayaran Konfigurasi'), route('admin.konfigurasi.pembayaran'));
        });
    
    Route::post('proses', 'App\Http\Controllers\Backend\Konfigurasi@proses')
        ->name('proses');
    Route::post('proses_logo', 'App\Http\Controllers\Backend\Konfigurasi@proses_logo')
        ->name('proses_logo');
    Route::post('proses_icon', 'App\Http\Controllers\Backend\Konfigurasi@proses_icon')
        ->name('proses_icon');
    Route::post('proses_email', 'App\Http\Controllers\Backend\Konfigurasi@proses_email')
        ->name('proses_email');
    Route::post('proses_gambar', 'App\Http\Controllers\Backend\Konfigurasi@proses_gambar')
        ->name('proses_gambar');
    Route::post('proses_pembayaran', 'App\Http\Controllers\Backend\Konfigurasi@proses_pembayaran')
        ->name('proses_pembayaran');
    Route::post('proses_profil', 'App\Http\Controllers\Backend\Konfigurasi@proses_profil')
        ->name('proses_profil');
});

// statistik
Route::group([
    'prefix' => 'statistik',
    'as' => 'statistik.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', ['App\Http\Controllers\Backend\Statistik', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Statistik'), route('admin.statistik.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Statistik', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.statistik.index')
                ->push(__('Delete Statistik'), route('admin.statistik.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Statistik@tambah')
        ->name('tambah'); 
    Route::post('edit', 'App\Http\Controllers\Backend\Statistik@edit')
        ->name('edit');
});

// subscribers
Route::group([
    'prefix' => 'subscribers',
    'as' => 'subscribers.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', ['App\Http\Controllers\Backend\Subscribers', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Subscribers'), route('admin.subscribers.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Subscribers', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.subscribers.index')
                ->push(__('Delete Subscribers'), route('admin.subscribers.delete', $par1)); 
        });
        
    Route::post('send_email', 'App\Http\Controllers\Backend\Subscribers@send_email')
        ->name('send_email')
        ->middleware('mail_config'); 
    Route::post('tambah', 'App\Http\Controllers\Backend\Subscribers@tambah')
        ->name('tambah'); 
    Route::post('edit', 'App\Http\Controllers\Backend\Subscribers@edit')
        ->name('edit');
});

// agenda
Route::group([
    'prefix' => 'agenda',
    'as' => 'agenda.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Agenda', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Agenda'), route('admin.agenda.index'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Agenda', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.agenda.index')
                ->push(__('Tambah Agenda'), route('admin.agenda.tambah'));
        });

    Route::get('cari', ['App\Http\Controllers\Backend\Agenda', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.agenda.index')
                ->push(__('Cari Agenda'), route('admin.agenda.cari'));
        });

    Route::get('add', ['App\Http\Controllers\Backend\Agenda', 'add'])
        ->name('add')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.agenda.index')
                ->push(__('Add Agenda'), route('admin.agenda.add'));
        });

    Route::get('status_agenda/{par1}', ['App\Http\Controllers\Backend\Agenda', 'status_agenda'])
        ->name('status_agenda')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.agenda.index')
                ->push(__('Status Agenda'), route('admin.agenda.status_agenda', $par1)); 
        });

    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Agenda', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.agenda.index')
                ->push(__('Kategori Agenda'), route('admin.agenda.kategori', $par1)); 
        });

    Route::get('jenis_agenda/{par1}', ['App\Http\Controllers\Backend\Agenda', 'jenis_agenda'])
        ->name('jenis_agenda')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.agenda.index')
                ->push(__('Jenis Agenda'), route('admin.agenda.jenis_agenda', $par1)); 
        });

    Route::get('author/{par1}', ['App\Http\Controllers\Backend\Agenda', 'author'])
        ->name('author')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.agenda.index')
                ->push(__('Author Agenda'), route('admin.agenda.author', $par1)); 
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Agenda', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.agenda.index')
                ->push(__('Edit Agenda'), route('admin.agenda.edit', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Agenda', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.agenda.index')
                ->push(__('Delete Agenda'), route('admin.agenda.delete', $par1)); 
        });

    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Agenda@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Agenda@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Agenda@proses')
        ->name('proses');
});

// rekening
Route::group([
    'prefix' => 'rekening',
    'as' => 'rekening.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Rekening', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Rekening'), route('admin.rekening.index'));
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Rekening', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.rekening.index')
                ->push(__('Edit Rekening'), route('admin.rekening.edit', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Rekening', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.rekening.index')
                ->push(__('Delete Rekening'), route('admin.rekening.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Rekening@tambah')
        ->name('tambah');
    Route::post('proses_edit', 'App\Http\Controllers\Backend\Rekening@proses_edit')
        ->name('proses_edit');
    Route::post('proses', 'App\Http\Controllers\Backend\Rekening@proses')
        ->name('proses');
});

// status
Route::group([
    'prefix' => 'status_site',
    'as' => 'status_site.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Status_site', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Status Site'), route('admin.status_site.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Status_site', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.status_site.index')
                ->push(__('Delete Status Site'), route('admin.status_site.delete', $par1)); 
        });
     
    Route::post('tambah', 'App\Http\Controllers\Backend\Status_site@tambah')
        ->name('tambah');
    Route::post('edit', 'App\Http\Controllers\Backend\Status_site@edit')
        ->name('edit');
});

// heading
Route::group([
    'prefix' => 'heading',
    'as' => 'heading.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Heading', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Heading'), route('admin.heading.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Heading', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.heading.index')
                ->push(__('Delete Heading'), route('admin.heading.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Heading@tambah')
        ->name('tambah');
    Route::post('edit', 'App\Http\Controllers\Backend\Heading@edit')
        ->name('edit');
});

// status
Route::group([
    'prefix' => 'status_proyek',
    'as' => 'status_proyek.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () { 

    Route::get('/', ['App\Http\Controllers\Backend\Status_proyek', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Status Proyek'), route('admin.status_proyek.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Status_proyek', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.status_proyek.index')
                ->push(__('Delete Status Proyek'), route('admin.status_proyek.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Status_proyek@tambah')
        ->name('tambah');
    Route::post('edit', 'App\Http\Controllers\Backend\Status_proyek@edit')
        ->name('edit');
});

// video
Route::group([
    'prefix' => 'video',
    'as' => 'video.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', ['App\Http\Controllers\Backend\Video', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Video'), route('admin.video.index'));
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Video', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.video.index')
                ->push(__('Edit Video'), route('admin.video.edit', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Video', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.video.index')
                ->push(__('Delete Video'), route('admin.video.delete', $par1)); 
        });
    
    Route::post('tambah', 'App\Http\Controllers\Backend\Video@tambah')
        ->name('tambah');
    Route::post('proses_edit', 'App\Http\Controllers\Backend\Video@proses_edit')
        ->name('proses_edit');
    Route::post('proses', 'App\Http\Controllers\Backend\Video@proses')
        ->name('proses');
});


// kategori_proyek
Route::group([
    'prefix' => 'kategori_proyek',
    'as' => 'kategori_proyek.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Kategori_proyek', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Kategori Proyek'), route('admin.kategori_proyek.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Kategori_proyek', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.kategori_proyek.index')
                ->push(__('Delete Kategori Proyek'), route('admin.kategori_proyek.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Kategori_proyek@tambah')
        ->name('tambah');
    Route::post('edit', 'App\Http\Controllers\Backend\Kategori_proyek@edit')
        ->name('edit'); 
});

// kategori_download
Route::group([
    'prefix' => 'kategori_download',
    'as' => 'kategori_download.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::get('/', ['App\Http\Controllers\Backend\Kategori_download', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Kategori Download'), route('admin.kategori_download.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Kategori_download', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.kategori_download.index')
                ->push(__('Delete Kategori Download'), route('admin.kategori_download.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Kategori_download@tambah')
        ->name('tambah');
    Route::post('edit', 'App\Http\Controllers\Backend\Kategori_download@edit')
        ->name('edit');

});

// kategori_galeri
Route::group([
    'prefix' => 'kategori_galeri',
    'as' => 'kategori_galeri.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Kategori_galeri', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Kategori Galeri'), route('admin.kategori_galeri.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Kategori_galeri', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.kategori_galeri.index')
                ->push(__('Delete Kategori Galeri'), route('admin.kategori_galeri.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Kategori_galeri@tambah')
        ->name('tambah'); 
    Route::post('edit', 'App\Http\Controllers\Backend\Kategori_galeri@edit')
        ->name('edit'); 
});

// kategori_staff
Route::group([
    'prefix' => 'kategori_staff',
    'as' => 'kategori_staff.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Kategori_staff', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Kategori Staff'), route('admin.kategori_staff.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Kategori_staff', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.kategori_staff.index')
                ->push(__('Delete Kategori Staff'), route('admin.kategori_staff.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Kategori_staff@tambah')
        ->name('tambah'); 
    Route::post('edit', 'App\Http\Controllers\Backend\Kategori_staff@edit')
        ->name('edit'); 
});

// kategori_agenda
Route::group([
    'prefix' => 'kategori_agenda',
    'as' => 'kategori_agenda.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Kategori_agenda', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Kategori Agenda'), route('admin.kategori_agenda.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Kategori_agenda', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.kategori_agenda.index')
                ->push(__('Delete Kategori Agenda'), route('admin.kategori_agenda.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Kategori_agenda@tambah')
        ->name('tambah'); 
    Route::post('edit', 'App\Http\Controllers\Backend\Kategori_agenda@edit')
        ->name('edit'); 
});

// kategori_akreditasi
Route::group([
    'prefix' => 'kategori_akreditasi',
    'as' => 'kategori_akreditasi.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Kategori_akreditasi', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Kategori Akreditasi'), route('admin.kategori_akreditasi.index'));
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Kategori_akreditasi', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.kategori_akreditasi.index')
                ->push(__('Delete Kategori Akreditasi'), route('admin.kategori_akreditasi.delete', $par1)); 
        });
        
    Route::post('tambah', 'App\Http\Controllers\Backend\Kategori_akreditasi@tambah')
        ->name('tambah'); 
    Route::post('edit', 'App\Http\Controllers\Backend\Kategori_akreditasi@edit')
        ->name('edit'); 
});

// galeri
Route::group([
    'prefix' => 'galeri',
    'as' => 'galeri.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Galeri', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Galeri'), route('admin.galeri.index'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Galeri', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.galeri.index')
                ->push(__('Tambah Galeri'), route('admin.galeri.tambah'));
        });

    Route::get('cari', ['App\Http\Controllers\Backend\Galeri', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.galeri.index')
                ->push(__('Cari Galeri'), route('admin.galeri.cari'));
        });

    Route::get('status_galeri/{par1}', ['App\Http\Controllers\Backend\Galeri', 'status_galeri'])
        ->name('status_galeri')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.galeri.index')
                ->push(__('Status Galeri'), route('admin.galeri.status_galeri', $par1)); 
        });
        
    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Galeri', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.galeri.index')
                ->push(__('Kategori Galeri'), route('admin.galeri.kategori', $par1)); 
        });
        
    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Galeri', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.galeri.index')
                ->push(__('Edit Galeri'), route('admin.galeri.edit', $par1)); 
        });
        
    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Galeri', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.galeri.index')
                ->push(__('Delete Galeri'), route('admin.galeri.delete', $par1)); 
        });
        
    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Galeri@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Galeri@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Galeri@proses')
        ->name('proses');

});

// staff
Route::group([
    'prefix' => 'staff',
    'as' => 'staff.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Staff', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Staff'), route('admin.staff.index'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Staff', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.staff.index')
                ->push(__('Tambah Staff'), route('admin.staff.tambah'));
        });

    Route::get('cari', ['App\Http\Controllers\Backend\Staff', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.staff.index')
                ->push(__('Cari Staff'), route('admin.staff.cari'));
        });

    Route::get('status_staff/{par1}', ['App\Http\Controllers\Backend\Staff', 'status_staff'])
        ->name('status_staff')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.staff.index')
                ->push(__('Status Staff'), route('admin.staff.status_staff', $par1)); 
        });

    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Staff', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.staff.index')
                ->push(__('Kategori Staff'), route('admin.staff.kategori', $par1)); 
        });

    Route::get('detail/{par1}', ['App\Http\Controllers\Backend\Staff', 'detail'])
        ->name('detail')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.staff.index')
                ->push(__('Detail Staff'), route('admin.staff.detail', $par1)); 
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Staff', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.staff.index')
                ->push(__('Edit Staff'), route('admin.staff.edit', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Staff', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.staff.index')
                ->push(__('Delete Staff'), route('admin.staff.delete', $par1)); 
        });
        
    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Staff@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Staff@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Staff@proses')
        ->name('proses');
});

// site
Route::group([
    'prefix' => 'site',
    'as' => 'site.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Site', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Site'), route('admin.site.index'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Site', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.site.index')
                ->push(__('Tambah Site'), route('admin.site.tambah'));
        });

    Route::get('cari', ['App\Http\Controllers\Backend\Site', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.site.index')
                ->push(__('Cari Site'), route('admin.site.cari'));
        });

    Route::get('status_site/{par1}', ['App\Http\Controllers\Backend\Site', 'status_site'])
        ->name('status_site')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.site.index')
                ->push(__('Status Site'), route('admin.site.status_site', $par1)); 
        });

    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Site', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.site.index')
                ->push(__('Kategori Site'), route('admin.site.kategori', $par1)); 
        });

    Route::get('detail/{par1}', ['App\Http\Controllers\Backend\Site', 'detail'])
        ->name('detail')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.site.index')
                ->push(__('Detail Site'), route('admin.site.detail', $par1)); 
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Site', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.site.index')
                ->push(__('Edit Site'), route('admin.site.edit', $par1)); 
        });

    Route::get('status/{par1}', ['App\Http\Controllers\Backend\Site', 'status'])
        ->name('status')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.site.index')
                ->push(__('Status Site'), route('admin.site.status', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Site', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.site.index')
                ->push(__('Delete Site'), route('admin.site.delete', $par1)); 
        });
        
    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Site@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Site@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Site@proses')
        ->name('proses');
});

// proyek
Route::group([
    'prefix' => 'proyek',
    'as' => 'proyek.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Proyek', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Proyek'), route('admin.proyek.index'));
        });

    Route::get('cari', ['App\Http\Controllers\Backend\Proyek', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.video.index')
                ->push(__('Cari Proyek'), route('admin.video.cari'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Proyek', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.video.index')
                ->push(__('Tambah Proyek'), route('admin.video.tambah'));
        });

    Route::get('status_proyek/{par1}', ['App\Http\Controllers\Backend\Proyek', 'status_proyek'])
        ->name('status_proyek')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.proyek.index')
                ->push(__('Status Proyek'), route('admin.proyek.status_proyek', $par1)); 
        });

    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Proyek', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.proyek.index')
                ->push(__('Kategori Proyek'), route('admin.proyek.kategori', $par1)); 
        });

    Route::get('detail/{par1}', ['App\Http\Controllers\Backend\Proyek', 'detail'])
        ->name('detail')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.proyek.index')
                ->push(__('Detail Proyek'), route('admin.proyek.detail', $par1)); 
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Proyek', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.proyek.index')
                ->push(__('Edit Proyek'), route('admin.proyek.edit', $par1)); 
        });

    Route::get('status/{par1}', ['App\Http\Controllers\Backend\Proyek', 'status'])
        ->name('status')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.proyek.index')
                ->push(__('Status Proyek'), route('admin.proyek.status', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Proyek', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.proyek.index')
                ->push(__('Delete Proyek'), route('admin.proyek.delete', $par1)); 
        });

    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Proyek@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Proyek@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Proyek@proses')
        ->name('proses');

});

// akreditasi
Route::group([
    'prefix' => 'akreditasi',
    'as' => 'akreditasi.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Akreditasi', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Akreditasi'), route('admin.akreditasi.index'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Akreditasi', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.akreditasi.index')
                ->push(__('Tambah Akreditasi'), route('admin.akreditasi.tambah'));
        });

    Route::get('cari', ['App\Http\Controllers\Backend\Akreditasi', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.akreditasi.index')
                ->push(__('Cari Akreditasi'), route('admin.akreditasi.cari'));
        });

    Route::get('status_akreditasi/{par1}', ['App\Http\Controllers\Backend\Akreditasi', 'status_akreditasi'])
        ->name('status_akreditasi')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.akreditasi.index')
                ->push(__('Status Akreditasi'), route('admin.akreditasi.status_akreditasi', $par1)); 
        });

    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Akreditasi', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.akreditasi.index')
                ->push(__('Kategori Akreditasi'), route('admin.akreditasi.kategori', $par1)); 
        });

    Route::get('detail/{par1}', ['App\Http\Controllers\Backend\Akreditasi', 'detail'])
        ->name('detail')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.akreditasi.index')
                ->push(__('Detail Akreditasi'), route('admin.akreditasi.detail', $par1)); 
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Akreditasi', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.akreditasi.index')
                ->push(__('Edit Akreditasi'), route('admin.akreditasi.edit', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Akreditasi', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.akreditasi.index')
                ->push(__('Delete Akreditasi'), route('admin.akreditasi.delete', $par1)); 
        });
        
    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Akreditasi@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Akreditasi@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Akreditasi@proses')
        ->name('proses');
});

// download
Route::group([
    'prefix' => 'download',
    'as' => 'download.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {

    Route::get('/', ['App\Http\Controllers\Backend\Download', 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.dashboard')
                ->push(__('Download'), route('admin.download.index'));
        });

    Route::get('cari', ['App\Http\Controllers\Backend\Download', 'cari'])
        ->name('cari')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.download.index')
                ->push(__('Cari Download'), route('admin.download.cari'));
        });

    Route::get('tambah', ['App\Http\Controllers\Backend\Download', 'tambah'])
        ->name('tambah')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.download.index')
                ->push(__('Tambah Download'), route('admin.download.tambah'));
        });

    Route::get('status_download/{par1}', ['App\Http\Controllers\Backend\Download', 'status_download'])
        ->name('status_download')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.download.index')
                ->push(__('Status Download'), route('admin.download.status_download', $par1)); 
        });

    Route::get('kategori/{par1}', ['App\Http\Controllers\Backend\Download', 'kategori'])
        ->name('kategori')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.download.index')
                ->push(__('Kategori Download'), route('admin.download.kategori', $par1)); 
        });

    Route::get('edit/{par1}', ['App\Http\Controllers\Backend\Download', 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.download.index')
                ->push(__('Edit Download'), route('admin.download.edit', $par1)); 
        });

    Route::get('unduh/{par1}', ['App\Http\Controllers\Backend\Download', 'unduh'])
        ->name('unduh')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.download.index')
                ->push(__('Unduh Download'), route('admin.download.unduh', $par1)); 
        });

    Route::get('delete/{par1}', ['App\Http\Controllers\Backend\Download', 'delete'])
        ->name('delete')
        ->breadcrumbs(function (Trail $trail, $par1) {
            $trail->parent('admin.download.index')
                ->push(__('Delete Download'), route('admin.download.delete', $par1)); 
        });
        
    Route::post('tambah_proses', 'App\Http\Controllers\Backend\Download@tambah_proses')
        ->name('tambah_proses');
    Route::post('edit_proses', 'App\Http\Controllers\Backend\Download@edit_proses')
        ->name('edit_proses');
    Route::post('proses', 'App\Http\Controllers\Backend\Download@proses')
        ->name('proses');
});
/* END BACK END*/