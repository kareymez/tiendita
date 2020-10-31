<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/', 'articulosController');
Route::resource('/articulos', 'articulosController');
Route::get('articulos/destroy/{id}', 'articulosController@destroy');


Route::resource('/proveedores', 'proveedoresController');
Route::get('proveedores/destroy/{id}', 'proveedoresController@destroy');

Route::resource('/ventas', 'ventasController');
Route::get('ventas/destroy/{id}', 'ventasController@destroy');
