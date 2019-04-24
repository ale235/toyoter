<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create',['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $usuario = new User([
            'name' => $request->get('username'),
            'email' => $request->get('mail'),
            'email_verified_at' => now(),
            'password' => bcrypt($request->get('username')), // secret
            'remember_token' => str_random(10),
        ]);
        $usuario->save();

        $usuario->assignRole($request->get('role'));

        $cliente = new Cliente([
            'razon_social' => $request->get('razon_social'),
            'telefono' => $request->get('telefono'),
            'user_id' => $usuario->id,
        ]);
        $cliente->save();

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
        $clienteedit = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('c.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user')
            ->where('c.id','=',$cliente->id)
            ->first();

        $user = User::find($clienteedit->id_user)->roles->pluck('name');

        return view('cliente.edit',['roles' => Role::all(), 'cliente' => $clienteedit, 'role' => $user[0]]);
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
        dd($cliente);
        User::findById($cliente)
                    ->update([
                        'name' => $request->get('username'),
                        'email' => $request->get('mail'),
                        'email_verified_at' => now(),
                        'password' => bcrypt($request->get('username')), // secret
                        'remember_token' => str_random(10),
                            ])
                    ->assignRole($request->get('role'));

        Cliente::findById($cliente)->update([
            'razon_social' => $request->get('razon_social'),
            'telefono' => $request->get('telefono'),
        ]);

        return view('cliente.create',['roles' => Role::all()]);
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

    public function listSinCategorizar(Request $request)
    {
//        dd($request);
        return view('cliente.listsincategorizar');
    }
}
