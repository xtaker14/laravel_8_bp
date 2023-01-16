<?php 
use App\Http\Livewire\Components\Backend\Select2User;

Route::group([
   'prefix' => 'livewire', 
   'as' => 'livewire.'
], function () {
   Route::get('get_user/{q}', [Select2User::class, 'getUserBy'])
      ->name('get_user')
      // ->where('q', '[0-9]+')
      ->where('q', '[a-z A-Z]+');
});

Route::get('/pegawai', function () {
   return 'test pegawai';
});
