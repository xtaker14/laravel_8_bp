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

use Modules\Pegawai\Http\Controllers\PegawaiController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'. 

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::group(['prefix' => 'pegawai', 'as' => 'pegawai.', 'middleware' => [
        'auth', 
        'password.expires', 
        'permission:admin.access.pegawai.list',
    ]], function () { 
        Route::get('/', [PegawaiController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Pegawai'), route('admin.pegawai.index'));
            });
    });
}); 

