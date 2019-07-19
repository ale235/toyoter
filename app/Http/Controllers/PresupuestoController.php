<?php

namespace App\Http\Controllers;

use App\DetallePresupuesto;
use App\Presupuesto;
use App\Repuesto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Exports\PresupuestosExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PresupuestoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuesto = Presupuesto::all();
        return view('presupuesto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarPresupuesto(Request $request)
    {
        return view('guest.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSessions(Request $request)
    {
        $sessions = (object)array(
            'codigo' => $request->codigo
        );
        Session::push('items',$sessions);

        $roleLogged = Auth::user()->roles->pluck('name');

        $precio_presupuesto_admin = Session::get('precio_admin');

        if($roleLogged[0] == 'cliente_minorista'){
            $items = DB::table('repuestos as r')
                ->join('precios as p','p.id','=','r.precio_id')
                ->where('r.codigo','=', $request->codigo)
                ->select('r.codigo','p.precio_minorista as precio','r.descripcion')
                ->get();
        } else if ($roleLogged[0] == 'cliente_mayorista'){
            $items = DB::table('repuestos as r')
                ->join('precios as p','p.id','=','r.precio_id')
                ->where('r.codigo','=', $request->codigo)
                ->select('r.codigo','p.precio_mayorista as precio','r.descripcion')
                ->get();
        }
        else if ($roleLogged[0] == 'cliente_taller'){
            $items = DB::table('repuestos as r')
                ->join('precios as p','p.id','=','r.precio_id')
                ->where('r.codigo','=', $request->codigo)
                ->select('r.codigo','p.precio_taller as precio','r.descripcion')
                ->get();
        }
        else if ($roleLogged[0] == 'admin'){
            if(is_null($precio_presupuesto_admin) || end($precio_presupuesto_admin) == 'Minorista'){

                $items = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $request->codigo)
                    ->select('r.codigo','p.precio_minorista as precio','r.descripcion')
                    ->get();
            } else if (end($precio_presupuesto_admin) == 'Mayorista'){

                $items = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $request->codigo)
                    ->select('r.codigo','p.precio_mayorista as precio', 'r.descripcion')
                    ->get();

            } else if (end($precio_presupuesto_admin) == 'Taller'){

                $items = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $request->codigo)
                    ->select('r.codigo','p.precio_taller as precio','r.descripcion')
                    ->get();
            }

        }

//        Session::push('items',$items);

        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeItemToSessions(Request $request)
    {

        $items = Session::get('items');

        //Para utilizar el array_count_values y de ahí sacar las cantidades,
        // vamos a tener que transformar el array de objetos en array de strings.
        $arrayParaTransformar = [];
        foreach ($items as $repuesto){

            array_push($arrayParaTransformar,$repuesto->codigo);
        }
        Session::forget('items');

        $bandera = 0;
        foreach ($arrayParaTransformar as $item){
            if ($request->codigo != $item) {
                $sessions = (object)array(
                    'codigo' => $item
                );
                Session::push('items',$sessions);
            }
            elseif ($request->codigo == $item && $bandera == 0){
                $bandera = 1;
//                return response()->json(Session::get('items'));
            }
            else {
                $sessions = (object)array(
                    'codigo' => $item
                );
                Session::push('items',$sessions);
            }
        }
        return response()->json(Session::get('items'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeAllItemsToSessions(Request $request)
    {

        $items = Session::forget('items');



        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Presupuesto $presupuesto)
    {
        $cliente = DB::table('clientes')
            ->where('id','=',$presupuesto->cliente_id)
            ->first();
//        dd();

        $admin = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('u.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.provincia','c.cuit', 'c.localidad', 'c.calleynumero', 'c.codigopostal', 'c.logoempresa')
            ->where('u.id','=',1)
            ->first();

//        $roleLoggueado = User::findOrFail($cliente->user_id)->roles->pluck('name')[0];

        $repuestos = DB::table('detalle_presupuestos as d')
            ->join('repuestos as r','r.codigo','=','d.codigo')
            ->join('precios as p','p.id','=','r.precio_id')
            ->where('d.presupuesto_id','=',$presupuesto->id)
            ->select('r.codigo','d.precio_venta as precio', 'p.precio_sugerido as precio_costo','r.descripcion','d.cantidad as cantidad', DB::raw('(d.cantidad * d.precio_venta) as subtotal'))
            ->get();

//        dd($repuestos);
        foreach ($repuestos as $repuesto){
            $repuesto->subtotal = $repuesto->precio * $repuesto->cantidad;
        }
        return view('presupuesto.show',['repuestos' => $repuestos, 'cliente' => $cliente, 'presupuesto' => $presupuesto, 'admin' => $admin, 'role' => 'admin']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        ini_set('max_execution_time', 120);
        //--Repo de Info para usar--
        //Tomamos el rol del Usuario que está logueado, para poder tomar el precio de los repuestos
        $cliente = DB::table('clientes')
            ->where('id','=',$presupuesto->cliente_id)
            ->first();
//        dd();

        $admin = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('u.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.provincia','c.cuit', 'c.localidad', 'c.calleynumero', 'c.codigopostal', 'c.logoempresa')
            ->where('u.id','=',1)
            ->first();

//        $roleLoggueado = User::findOrFail($cliente->user_id)->roles->pluck('name')[0];

        $repuestos = DB::table('detalle_presupuestos as d')
            ->join('repuestos as r','r.codigo','=','d.codigo')
            ->join('precios as p','p.id','=','r.precio_id')
            ->where('d.presupuesto_id','=',$presupuesto->id)
            ->select('r.codigo','d.precio_venta as precio', 'p.precio_sugerido as precio_costo','r.descripcion','d.cantidad as cantidad', DB::raw('(d.cantidad * d.precio_venta) as subtotal'))
            ->get();

//        dd($repuestos);
        foreach ($repuestos as $repuesto){
            $repuesto->subtotal = $repuesto->precio * $repuesto->cantidad;
        }

        $pdf = PDF::loadView('exports.presupuesto', ['repuestos' => $repuestos, 'cliente' => $cliente, 'presupuesto' => $presupuesto, 'admin' => $admin, 'role' => 'admin']);
        return $pdf->download('Presupuesto-'.trim($cliente->razon_social).'-'.date('d/m/Y', strtotime($presupuesto->created_at)).'.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function exportPresupuesto(Request $request)
    {
        $admin = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('u.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.provincia','c.cuit', 'c.localidad', 'c.codigopostal', 'c.calleynumero', 'c.logoempresa')
            ->where('u.id','=',1)
            ->first();

        //--Repo de Info para usar--
        //Tomamos el rol del Usuario que está logueado, para poder tomar el precio de los repuestos
        $roleLoggueado = Auth::user()->roles->pluck('name');
        //Tomamos el Cliente para completar los datos en el presupuesto
        $cliente = DB::table('clientes as c')
            ->where('c.user_id','=',Auth::user()->id)
            ->first();
        //Tomamos todos los repuestos que metió en el carrito, están guardados en la Sesión, de ahi hay que sacar la cantidad
        $sessions = Session::get('items');
        //--Fin del Repo--

        $precio_presupuesto_admin = Session::get('precio_admin');
        //dd($value);

        //--Armamos el Presupuesto--
        $presupuesto = new Presupuesto();
        $presupuesto->cliente_id = $cliente->id;
        $presupuesto->montototal = 0;
        $presupuesto->save();
        //--Fin del Presupuesto--

        //--Armamos los detalles del presupuesto
        //Para utilizar el array_count_values y de ahí sacar las cantidades,
        // vamos a tener que transformar el array de objetos en array de strings.
        $arrayParaTransformar = [];
        foreach ($sessions as $repuesto){
            array_push($arrayParaTransformar,$repuesto->codigo);
        }
        $arrayDeCantidades= array_count_values ($arrayParaTransformar);
        //Ahora vamos a buscar cada repuesto y lo metemos en el arrayRepuestos, y con una variable armamos el total
        $arrayRepuestos = [];
        $total = 0;
        foreach ($arrayDeCantidades as $key => $s){
//            dd($s);
            $repuesto = DB::table('repuestos')
                            ->where('codigo','=', $key)
                            ->first();

            if($roleLoggueado[0] == 'cliente_minorista'){
                $precio = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $repuesto->codigo)
                    ->select('r.codigo','p.precio_minorista as precio', 'p.precio_sugerido as precio_costo','r.descripcion')
                    ->first();
            }
            else if ($roleLoggueado[0] == 'cliente_mayorista'){
                $precio = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $repuesto->codigo)
                    ->select('r.codigo','p.precio_mayorista as precio', 'p.precio_sugerido as precio_costo','r.descripcion')
                    ->first();
            }
            else if ($roleLoggueado[0] == 'cliente_taller'){
                $precio = DB::table('repuestos as r')
                    ->join('precios as p','p.id','=','r.precio_id')
                    ->where('r.codigo','=', $repuesto->codigo)
                    ->select('r.codigo','p.cliente_taller as precio', 'p.precio_sugerido as precio_costo','r.descripcion')
                    ->first();
            }
            else if ($roleLoggueado[0] == 'admin'){
                if(is_null($precio_presupuesto_admin) || end($precio_presupuesto_admin) == 'Minorista'){

                    $precio = DB::table('repuestos as r')
                        ->join('precios as p','p.id','=','r.precio_id')
                        ->where('r.codigo','=', $repuesto->codigo)
                        ->select('r.codigo','p.precio_minorista as precio', 'p.precio_sugerido as precio_costo','r.descripcion')
                        ->first();
                } else if (end($precio_presupuesto_admin) == 'Mayorista'){

                    $precio = DB::table('repuestos as r')
                        ->join('precios as p','p.id','=','r.precio_id')
                        ->where('r.codigo','=', $repuesto->codigo)
                        ->select('r.codigo','p.precio_mayorista as precio', 'p.precio_sugerido as precio_costo','r.descripcion')
                        ->first();

                } else if (end($precio_presupuesto_admin) == 'Taller'){

                    $precio = DB::table('repuestos as r')
                        ->join('precios as p','p.id','=','r.precio_id')
                        ->where('r.codigo','=', $repuesto->codigo)
                        ->select('r.codigo','p.precio_taller as precio', 'p.precio_sugerido as precio_costo','r.descripcion')
                        ->first();
                }

            }
            $repuesto->precio = $precio->precio;
            $repuesto->precio_costo = $precio->precio_costo;
            $repuesto->cantidad = $s;
            $repuesto->subtotal = $repuesto->precio * $repuesto->cantidad;

            //--Aramamos el Detalle del Presupuesto--
            $detallePresupuesto = new DetallePresupuesto();
            $detallePresupuesto->presupuesto_id = $presupuesto->id;
            $detallePresupuesto->codigo = $repuesto->codigo;
            $detallePresupuesto->cantidad = $repuesto->cantidad;
            $detallePresupuesto->precio_sugerido = $repuesto->precio_costo;
            $detallePresupuesto->precio_venta = $repuesto->precio;
            $detallePresupuesto->save();
            //--Fin del Detalle Presupuesto--
            $total = $total + $repuesto->subtotal;

            array_push($arrayRepuestos,$repuesto);
        }

        $actualizarPresupuesto = Presupuesto::find($presupuesto->id);
        $actualizarPresupuesto->montototal = $total;
        $actualizarPresupuesto->update();
        $pdf = PDF::loadView('exports.presupuesto', ['repuestos' => $arrayRepuestos, 'cliente' => $cliente, 'presupuesto' => $actualizarPresupuesto, 'admin' => $admin, 'role' => $roleLoggueado[0]]);
        return $pdf->download('Presupuesto-'.trim($cliente->razon_social).'-'.date('d/m/Y', strtotime($presupuesto->created_at)).'.pdf');
    }

    public function limpiarPresupuesto(Request $request)
    {
        Session::forget('items');

        $repuestos  = [];
        $precio_presupuesto_admin = Session::get('precio_admin');


//    dd(!is_null($precio_presupuesto_admin) ? end($precio_presupuesto_admin) : null);
        return view('guest.index', ['sessions' => $repuestos, 'total' => 0, 'precio_admin' => !is_null($precio_presupuesto_admin) ? end($precio_presupuesto_admin) : null]);

    }

    public function cambiarpreciopresupuesto(Request $request){
//        dd($request);
        $items = Session::get('items');
//        $request->session()->put('precio_admin', $request->get('optradio'));
        Session::push('precio_admin',$request->get('optradio'));
        $repuestos  = [];
//        dd($items);
        if(!is_null($items) && count($items) == 1){
            $items  = $items[0];
        }
        $total = 0;
        if($items != null){
            $roleLogged = Auth::user()->roles->pluck('name');
            $aux = collect();
            foreach ($items as $item){
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
                } else if ($roleLogged[0] == 'admin') {
                    if($request->get('optradio') == 'Minorista'){
                        $repuesto = DB::table('repuestos as r')
                            ->join('precios as p','p.id','=','r.precio_id')
                            ->where('r.codigo','=', $clave)
                            ->select('r.codigo','p.precio_minorista as precio','r.descripcion')
                            ->get();
                    } else if ($request->get('optradio') == 'Mayorista'){

                        $repuesto = DB::table('repuestos as r')
                            ->join('precios as p','p.id','=','r.precio_id')
                            ->where('r.codigo','=', $clave)
                            ->select('r.codigo','p.precio_mayorista as precio','r.descripcion')
                            ->get();
                    } else if ($request->get('optradio') == 'Taller'){

                        $repuesto = DB::table('repuestos as r')
                            ->join('precios as p','p.id','=','r.precio_id')
                            ->where('r.codigo','=', $clave)
                            ->select('r.codigo','p.precio_taller as precio','r.descripcion')
                            ->get();
                    }
                }
                $repuesto['cantidad'] = $valor;
                $total = $total + ($repuesto['cantidad'] * $repuesto[0]->precio);
                array_push($repuestos, $repuesto);
            }
        }

        return view('guest.index',['sessions' => $repuestos, 'total' => $total, 'precio_admin' => $request->get('optradio')]);
    }
}
