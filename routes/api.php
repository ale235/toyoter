<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('buscarRepuestos', function (Request $request){

    if(auth('api')->check()){

        $repuestos = DB::table('repuestos')
            ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
            ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
            ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
            ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
            ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto_id', 'marca_vehiculos.nombre as marca_vehiculo_id', 'secciones.nombre as seccion_id', 'precios.precio_sugerido as precio_id');
    }
    else{
        dd($request->user('api'));
        $roleLogged = Auth::user()->roles->pluck('name');
        if($roleLogged[0] == 'cliente_minorista')
        {
            $repuestos = DB::table('repuestos')
                ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
                ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
                ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
                ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
                ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto_id', 'marca_vehiculos.nombre as marca_vehiculo_id', 'secciones.nombre as seccion_id', 'precios.precio_minorista as precio_id');

        }
        else if($roleLogged[0] == 'cliente_mayorista')
        {
            $repuestos = DB::table('repuestos')
                ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
                ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
                ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
                ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
                ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto_id', 'marca_vehiculos.nombre as marca_vehiculo_id', 'secciones.nombre as seccion_id', 'precios.precio_mayorista as precio_id');

        }
        else if($roleLogged[0] == 'cliente_taller'){
            dd($roleLogged[0]);
            $repuestos = DB::table('repuestos')
                ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
                ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
                ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
                ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
                ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto_id', 'marca_vehiculos.nombre as marca_vehiculo_id', 'secciones.nombre as seccion_id', 'precios.precio_taller as precio_id');
        }
        else {
            dd($roleLogged[0]);
            return "hola";
            $repuestos = DB::table('repuestos')
                ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
                ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
                ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
                ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
                ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto_id', 'marca_vehiculos.nombre as marca_vehiculo_id', 'secciones.nombre as seccion_id', 'precios.precio_sugerido as precio_id');
        }
    }



return datatables($repuestos)
    ->addColumn('btn', 'datatables.actions')
    ->rawColumns(['btn'])
    ->toJson();

});

Route::get('buscarRepuestosBackendPrecio', function (){

    $repuestos = DB::table('repuestos')
        ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
        ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
        ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
        ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
        ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto_id', 'marca_vehiculos.nombre as marca_vehiculo_id', 'secciones.nombre as seccion_id', 'precios.precio_minorista as precio_id_minorista', 'precios.precio_mayorista as precio_id_mayorista', 'precios.precio_sugerido as precio_id_sugerido', 'precios.precio_taller as precio_id_taller');

    return datatables($repuestos)
        ->addColumn('btn', 'datatables.actionsbackendprecio')
        ->rawColumns(['btn'])
        ->toJson();

});

Route::get('listarClientes', function (){

    $clientes = DB::table('users')
        ->join('clientes', 'clientes.user_id', '=', 'users.id')
        ->where('users.id','!=',1)
        ->get();

    return datatables($clientes)
        ->addColumn('btn', 'datatables.actionsbackendcliente')
        ->rawColumns(['btn'])
        ->toJson();

});

Route::get('listarClientesSinCategorizar', function (){

    $users = User::role('cliente_sin_categorizar')
        ->join('clientes', 'clientes.user_id', '=', 'users.id')
        ->select('clientes.id', 'clientes.razon_social', 'users.name','clientes.cuit');

    return datatables($users)
        ->addColumn('btn', 'datatables.actionsbackendcliente')
        ->rawColumns(['btn'])
        ->toJson();

});

Route::get('listarPresupuestos', function (){

    $presupuestos = DB::table('presupuestos')
        ->join('clientes', 'clientes.id', '=', 'presupuestos.cliente_id')
        ->select('presupuestos.id', 'clientes.razon_social as cliente', 'presupuestos.montototal');


    return datatables($presupuestos)
        ->addColumn('btn', 'datatables.actionsbackendpresupuesto')
        ->rawColumns(['btn'])
        ->toJson();

});