<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
	return view('auth/login');
});

Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'user'])->name('usuarios.index');




Route::get('/usuarios/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit');
Route::post('/usuarios/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');

Route::delete('/usuarios/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('usuarios.delete');




Route::post('/usuarios/crear', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/crear', [App\Http\Controllers\UserController::class, 'create_user'])->name('usuarios.create');





Route::get('/clientes', [App\Http\Controllers\DetalleClientesController::class, 'cliente'])->name('cliente');
Route::get('/clientes/crear', [App\Http\Controllers\DetalleClientesController::class, 'create_cliente'])->name('cliente.create');

Route::get('/productos', [App\Http\Controllers\DetalleProductosController::class, 'producto'])->name('producto');
			
Route::get('/proveedores', [App\Http\Controllers\DetalleProveedorController::class, 'proveedor'])->name('proveedor');


Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
