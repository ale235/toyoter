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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function (Request $request) {

    $items = Session::get('items');
    $repuestos  = [];
    $precio_presupuesto_admin = Session::get('precio_admin');

    if(!is_null($items) && count($items) == 1 ){
        $items  = $items[0];
    }
    $total = 0;
    if($items != null){
        $roleLogged = Auth::user()->roles->pluck('name');
        $aux = collect();
        foreach ($items as $item){
//                dd(is_object($item));
                if(!is_object($item)){
                    $aux->push($item);
                } else {
                    $aux->push($item->codigo);
                }
        }
        $aux = array_count_values($aux->toArray());

        foreach ($aux as $clave => $valor) {
            if($roleLogged[0] == 'cliente_minorista'){
                $repuesto = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $clave)
                    ->select('r.codigo','p.precio_minorista as precio','r.descripcion')
                    ->get();
            } else if ($roleLogged[0] == 'cliente_mayorista'){
                $repuesto = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $clave)
                    ->select('r.codigo','p.precio_mayorista as precio','r.descripcion')
                    ->get();
            }
            else if ($roleLogged[0] == 'cliente_taller'){
                $repuesto = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $clave)
                    ->select('r.codigo','p.precio_taller as precio','r.descripcion')
                    ->get();
            }
            else if ($roleLogged[0] == 'admin'){
//                    dd($precio_presupuesto_admin);
                if(is_null($precio_presupuesto_admin) || end($precio_presupuesto_admin) == 'Minorista'){

                    $repuesto = DB::table('repuestos as r')
                        ->join('precios as p','p.id','=','r.precio_id')
                        ->where('r.codigo','=', $clave)
                        ->select('r.codigo','p.precio_minorista as precio','r.descripcion')
                        ->get();
                } else if (end($precio_presupuesto_admin) == 'Mayorista'){

                    $repuesto = DB::table('repuestos as r')
                        ->join('precios as p','p.id','=','r.precio_id')
                        ->where('r.codigo','=', $clave)
                        ->select('r.codigo','p.precio_mayorista as precio','r.descripcion')
                        ->get();

                } else if (end($precio_presupuesto_admin) == 'Taller'){

                    $repuesto = DB::table('repuestos as r')
                        ->join('precios as p','p.id','=','r.precio_id')
                        ->where('r.codigo','=', $clave)
                        ->select('r.codigo','p.precio_taller as precio','r.descripcion')
                        ->get();
                }

            }
            if(count($repuesto) == 0){
                $repuesto[0] = (object) array('precio' => 0);

            }
            $repuesto['cantidad'] = $valor;
            $total = $total + ($repuesto['cantidad'] * $repuesto[0]->precio);
            array_push($repuestos, $repuesto);
        }
    }

//    dd(!is_null($precio_presupuesto_admin) ? end($precio_presupuesto_admin) : null);
    return view('welcome', ['sessions' => $repuestos, 'total' => $total, 'precio_admin' => !is_null($precio_presupuesto_admin) ? end($precio_presupuesto_admin) : null]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('role:admin');
Route::get('/buscar', 'GuestController@index')->name('buscar');
Route::resource('repuesto','RepuestoController')->middleware('role:admin');
Route::resource('guest','GuestController');
Route::get('/cliente/listsincategorizar','ClienteController@listSinCategorizar');
Route::get('/cliente/serviciomail','ClienteController@servicioMail');

Route::resource('cliente','ClienteController')->middleware('role:admin');
Route::get('admin/edit','ClienteController@modificarAdmin');
Route::get('/configuraciondeprecio', 'GuestController@configuraciondeprecio')->name('configuraciondeprecio')->middleware('role:cliente_mayorista');
Route::post('guest/preciocliente', 'GuestController@preciocliente');
Route::resource('precio','PrecioController')->middleware('role:admin');
Route::resource('presupuesto','PresupuestoController');
Route::get('addtosessions','PresupuestoController@addSessions');
Route::get('removeitemtosessions','PresupuestoController@removeItemToSessions');
//Route::post('guardarpresupuesto','PresupuestoController@guardarPresupuesto');
Route::post('actualizarpreciominorista', 'PrecioController@actualizarpreciominorista')->middleware('role:admin');
Route::post('actualizarpreciomayorista', 'PrecioController@actualizarpreciomayorista')->middleware('role:admin');
Route::post('actualizarpreciotaller', 'PrecioController@actualizarpreciotaller')->middleware('role:admin');
//Route::post('user/create', 'HomeController@store');

Route::get('export', 'RepuestoController@export')->name('export')->middleware('role:admin');
Route::get('exportpresupuesto', 'PresupuestoController@exportPresupuesto');
Route::get('limpiarpresupuesto', 'PresupuestoController@limpiarPresupuesto');
Route::get('exportcliente', 'ClienteController@exportClientes')->middleware('role:admin');
//Route::get('exportadmin', 'PresupuestoController@exportAdmin');
Route::get('importExportView', 'RepuestoController@importExportView')->middleware('role:admin');
Route::post('import', 'RepuestoController@import')->name('import')->middleware('role:admin');

Route::get('autocomplete',array('as'=>'autocomplete', 'uses'=>'RepuestoController@autocomplete'));
Route::get('repuestos', 'GuestController@repuestos')->middleware('role:admin');

Route::get('/clientesSinActivar','HomeController@clientesSinActivar');

Route::get('/check',function(){
    return ((Auth::guest() || (Auth::user()->roles->pluck('name')[0] == 'cliente_sin_categorizar'))  ? 'true' : 'false');
});

Route::post('guest/cambiarimagen', 'GuestController@cambiarimagen')->middleware('role:admin');
Route::post('cambiarpreciopresupuesto', 'PresupuestoController@cambiarpreciopresupuesto')->middleware('role:admin');


Route::get('/send/send_feedback', 'HomeController@sendFeedback');

