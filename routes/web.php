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
Route::get('/usuarios/detalles/{id}', [App\Http\Controllers\UserController::class, 'details'])->name('usuarios.detalles');
Route::post('/usuarios/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('usuarios.delete');
Route::post('/usuarios/crear', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/crear', [App\Http\Controllers\UserController::class, 'create_user'])->name('usuarios.create');


Route::get('/clientes', [App\Http\Controllers\DetalleClientesController::class, 'cliente'])->name('cliente');
Route::get('/clientes/crear', [App\Http\Controllers\DetalleClientesController::class, 'create_cliente'])->name('cliente.create');
Route::get('/clientes/edit/{id}', [App\Http\Controllers\DetalleClientesController::class, 'edit'])->name('clientes.edit');
Route::get('/clientes/detalles/{id}', [App\Http\Controllers\DetalleClientesController::class, 'details'])->name('clientes.detalles');
Route::post('/clientes/update/{id}', [App\Http\Controllers\DetalleClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/delete/{id}', [App\Http\Controllers\DetalleClientesController::class, 'delete'])->name('clientes.delete');
Route::post('/clientes/crear', [App\Http\Controllers\DetalleClientesController::class, 'store'])->name('clientes.store');





Route::get('/productos', [App\Http\Controllers\DetalleProductosController::class, 'producto'])->name('producto');
Route::get('/productos/crear', [App\Http\Controllers\DetalleProductosController::class, 'create_producto'])->name('producto.create');
Route::get('/productos/edit/{id}', [App\Http\Controllers\DetalleProductosController::class, 'edit'])->name('productos.edit');
Route::get('/productos/detalles/{id}', [App\Http\Controllers\DetalleProductosController::class, 'details'])->name('productos.detalles');
Route::post('/productos/update/{id}', [App\Http\Controllers\DetalleProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{id}', [App\Http\Controllers\DetalleProductosController::class, 'delete'])->name('productos.delete');
Route::post('/productos/crear', [App\Http\Controllers\DetalleProductosController::class, 'store'])->name('productos.store');


Route::get('/proveedores', [App\Http\Controllers\DetalleProveedorController::class, 'proveedor'])->name('proveedor');
Route::get('/proveedores/crear', [App\Http\Controllers\DetalleProveedorController::class, 'create_proveedor'])->name('proveedor.create');
Route::get('/proveedores/edit/{id}', [App\Http\Controllers\DetalleProveedorController::class, 'edit'])->name('proveedores.edit');
Route::get('/proveedores/detalles/{id}', [App\Http\Controllers\DetalleProveedorController::class, 'details'])->name('proveedores.detalles');
Route::post('/proveedores/update/{id}', [App\Http\Controllers\DetalleProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/delete/{id}', [App\Http\Controllers\DetalleProveedorController::class, 'delete'])->name('proveedores.delete');
Route::post('/proveedores/crear', [App\Http\Controllers\DetalleProveedorController::class, 'store'])->name('proveedores.store');



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
