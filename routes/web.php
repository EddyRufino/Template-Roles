<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['prefix' => 'admin',
              'namespace' => 'Admin',
              'middleware' => 'auth'],
function() {
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('users', 'UserController');
});

Route::get('profile', 'ProfileController@edit')
            ->name('profile.edit');

Route::put('profile', 'ProfileController@update')
            ->name('profile.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
