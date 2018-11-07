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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'configuracion'], function(){
	// Rutas para el modulo de usuarios
	Route::resource('users', 'UserController',['except' => 'show']);
});

Route::get('/perfil','UserController@perfil')->name('users.perfil');
Route::put('users/{user}/password','UserController@updatepassword')->name('users.updatepassword');
Route::get('users/apiUsers','UserController@apiUsers')->name('users.apiUsers');