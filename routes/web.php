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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(
    ['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],
    function () {
          Route::get('dashboard', 'DashboardController@index')->name('dashboard');
          Route::resource('slider', 'SliderController');

          Route::post('store', 'UserController@store')->name('user.store');

          Route::get('users', 'UserController@index')->name('user.index');
          Route::get('roles', 'RoleController@index')->name('role.index');


    });


Route::group(
    ['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']],
    function () {
          Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    });

