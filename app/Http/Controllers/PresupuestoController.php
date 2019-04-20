<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use App\Repuesto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        } else {
            $items = DB::table('repuestos as r')
                ->join('precios as p','p.id','=','r.precio_id')
                ->where('r.codigo','=', $request->codigo)
                ->select('r.codigo','p.precio_sugerido as precio','r.descripcion')
                ->get();
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
        if(count($items)){
            $items  = $items[0];
        }
        foreach ($items as $key => $item){
            if ($item != [] && $request->codigo == $item->codigo)
            {
                unset($items[$key]);

                Session::forget('items');
                Session::push('items',$items);
                break;

            }
        }
        return response()->json($items);

//        return response()->json(Session::get('items'));


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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        //
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
}
