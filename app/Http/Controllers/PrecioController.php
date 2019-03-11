<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Precio;
use App\PrecioHistorico;
use App\Repuesto;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PrecioController extends Controller
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
        return view('precio.create',['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
//        dd($request);
//        $usuario = new User([
//            'name' => $request->get('username'),
//            'email' => $request->get('mail'),
//            'email_verified_at' => now(),
//            'password' => bcrypt($request->get('username')), // secret
//            'remember_token' => str_random(10),
//        ]);
//        $usuario->save();
//
//        $usuario->assignRole($request->get('role'));
//
//        $cliente = new Cliente([
//            'razon_social' => $request->get('razon_social'),
//            'telefono' => $request->get('telefono'),
//            'user_id' => $usuario->id,
//        ]);
//        $cliente->save();

        return view('cliente.create',['roles' => Role::all()]);
//        return view('cliente.show', $cliente->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function actualizarpreciominorista(Request $request)
    {
        set_time_limit(0);

        $repuestos = DB::table('repuestos')->get();

        foreach ($repuestos as $repuesto) {

            $precioacual = Precio::find($repuesto->precio_id);
            Precio::find($repuesto->precio_id)->update(
                [
                    'precio_minorista' => DB::raw('p.precio_sugerido * '.((float)($request->get('coeficienteminorista')/100)+1).''),
                    'precio_minorista_co' => $request->get('coeficienteminorista'),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
        }
        return view('precio.create');

    }

    public function actualizarpreciomayorista(Request $request)
    {
        set_time_limit(0);

        DB::table('repuestos as r')
            ->join('precios as p','p.id','=','r.precio_id')
            ->update([
                'p.precio_mayorista' => DB::raw('p.precio_sugerido * '.((float)($request->get('coeficientemayorista')/100) + 1).''),
                'p.precio_mayorista_co' => $request->get('coeficientemayorista'),
                'p.updated_at' => Carbon::now()->toDateTimeString()]);

        return view('precio.create');

    }
}
