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

Route::get('/home', 'HomeController@index')->name('home')->middleware('role:admin');
Route::get('/buscar', 'GuestController@index')->name('buscar');
Route::resource('repuesto','RepuestoController')->middleware('role:admin');
Route::resource('guest','GuestController');
Route::resource('cliente','ClienteController')->middleware('role:admin');
Route::resource('precio','PrecioController')->middleware('role:admin');
Route::post('actualizarpreciominorista', 'PrecioController@actualizarpreciominorista')->middleware('role:admin');
Route::post('actualizarpreciomayorista', 'PrecioController@actualizarpreciomayorista')->middleware('role:admin');
//Route::post('user/create', 'HomeController@store');

Route::get('export', 'RepuestoController@export')->name('export')->middleware('role:admin');
Route::get('importExportView', 'RepuestoController@importExportView')->middleware('role:admin');
Route::post('import', 'RepuestoController@import')->name('import')->middleware('role:admin');

Route::get('autocomplete',array('as'=>'autocomplete', 'uses'=>'RepuestoController@autocomplete'));
Route::get('repuestos', 'GuestController@repuestos')->middleware('role:admin');

