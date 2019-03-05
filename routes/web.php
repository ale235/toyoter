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
Route::resource('repuesto/repuestos','RepuestoController');
Route::get('repuesto/actualizar', 'RepuestoController@actualizar');

Route::get('export', 'RepuestoController@export')->name('export');
Route::get('importExportView', 'RepuestoController@importExportView');
Route::post('import', 'RepuestoController@import')->name('import');

Route::get('autocomplete',array('as'=>'autocomplete', 'uses'=>'RepuestoController@autocomplete'));

