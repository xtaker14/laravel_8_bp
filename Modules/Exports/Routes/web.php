<?php 

use Modules\Exports\Http\Controllers\ExportsController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::group(['prefix' => 'exports', 'as' => 'exports.', 'middleware' => [
        'auth', 
        'password.expires',
        'permission:admin.access.exports.list',
    ]], function () { 
        Route::get('/', [ExportsController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Export Excel'), route('admin.exports.index'));
            });

        Route::post('excel', [ExportsController::class, 'exportExcel'])
            ->name('dlexcel');
    });
});