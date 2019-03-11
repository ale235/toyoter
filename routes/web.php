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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buscar', 'GuestController@index')->name('buscar');
Route::resource('repuesto','RepuestoController');
Route::resource('guest','GuestController');
Route::resource('cliente','ClienteController');
Route::resource('precio','PrecioController');
Route::post('actualizarpreciominorista', 'PrecioController@actualizarpreciominorista');
Route::post('actualizarpreciomayorista', 'PrecioController@actualizarpreciomayorista');
//Route::post('user/create', 'HomeController@store');

Route::get('export', 'RepuestoController@export')->name('export');
Route::get('importExportView', 'RepuestoController@importExportView');
Route::post('import', 'RepuestoController@import')->name('import');

Route::get('autocomplete',array('as'=>'autocomplete', 'uses'=>'RepuestoController@autocomplete'));
Route::get('repuestos', 'GuestController@repuestos');

