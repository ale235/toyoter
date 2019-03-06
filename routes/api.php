<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('repuestos', function (){

    $repuestos = DB::table('repuestos')
        ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
        ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
        ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
        ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
        ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto_id', 'marca_vehiculos.nombre as marca_vehiculo_id', 'secciones.nombre as seccion_id');

return datatables($repuestos)->toJson();
//    return datatables()->of(        )->toJson();

//    return datatables()
//        ->query(DB::table('repuestos')
//            ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
//            ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
//            ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
//            ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
//            ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto', 'marca_vehiculos.nombre as marca_vehiculo', 'secciones.nombre as seccion')
//        )
//        ->toJson();
});