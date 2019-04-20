<?php

namespace App\Http\Controllers;

use App\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Session::get('items');
        $repuestos  = [];
//        dd($items);
        if(count($items) == 1){
            $items  = $items[0];
        }
         $total = 0;
        if($items != null){
            $roleLogged = Auth::user()->roles->pluck('name');
            $aux = collect();
            foreach ($items as $item){
//                dd($item);
                $aux->push($item->codigo);
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
                } else {
                    $repuesto = DB::table('repuestos as r')
                        ->join('precios as p','p.id','=','r.precio_id')
                        ->where('r.codigo','=', $clave)
                        ->select('r.codigo','p.precio_sugerido as precio','r.descripcion')
                        ->get();
                }
                $repuesto['cantidad'] = $valor;
                $total = $total + ($repuesto['cantidad'] * $repuesto[0]->precio);
                array_push($repuestos, $repuesto);
            }
        }
        return view('guest.index',['sessions' => $repuestos, 'total' => $total]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repuestos = DB::table('repuestos')
            ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto', 'marca_vehiculos.nombre as marca_vehiculo', 'secciones.nombre as seccion', 'precios.precio_minorista as precio_minorista', 'precios.precio_mayorista as precio_mayorista', 'precios.precio_sugerido as precio_sugerido')
            ->join('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
            ->join('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
            ->join('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
            ->join('precios', 'precios.id', '=', 'repuestos.precio_id')
            ->where('repuestos.id','=',$id)
            ->first();

        return view('guest.show',['repuesto'=>$repuestos]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function repuestos()
    {
        return datatables()
            ->query(DB::table('repuestos')
                ->leftJoin('marca_repuestos', 'marca_repuestos.id', '=', 'repuestos.marca_repuesto_id')
                ->leftJoin('marca_vehiculos', 'marca_vehiculos.id', '=', 'repuestos.marca_vehiculo_id')
                ->leftJoin('secciones', 'secciones.id', '=', 'repuestos.seccion_id')
                ->leftJoin('precios', 'precios.id', '=', 'repuestos.precio_id')
                ->select('repuestos.id', 'repuestos.codigo', 'repuestos.descripcion','marca_repuestos.nombre as marca_repuesto', 'marca_vehiculos.nombre as marca_vehiculo', 'secciones.nombre as seccion')
            )->toJson();
    }
}
