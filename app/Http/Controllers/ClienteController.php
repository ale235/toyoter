<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Mail\AcceptMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
//        dd(Role::all());
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
//            'password' => bcrypt($request->get('username')), // El user es la contraseña
//            'remember_token' => str_random(10),
        ]);
        $usuario->save();

        $usuario->assignRole($request->get('role'));

        $cliente = new Cliente([
            'razon_social' => $request->get('razon_social'),
            'telefono' => $request->get('telefono'),
            'user_id' => $usuario->id,
            'cuit' => $request->get('cuit'),
            'iva' => $request->get('iva'),
            'chasis' => $request->get('chasis'),
            'provincia' => $request->get('provincia'),
            'localidad' => $request->get('localidad'),
            'calleynumero' => $request->get('calleynumero'),
            'codigopostal' => $request->get('codigopostal'),
            'logoempresa' => $request->get('filepath'),
        ]);
        $cliente->save();

        $clienteedit = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('u.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.provincia','c.localidad','c.calleynumero','c.codigopostal','c.cuit','c.logoempresa')
            ->where('c.id','=',$cliente->id)
            ->first();

        return view('cliente.show',['roles' => Role::all(),'cliente' => $clienteedit, 'role' => $request->get('role')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $clienteedit = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('u.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.provincia','c.localidad','c.calleynumero','c.codigopostal','c.cuit','c.logoempresa')
            ->where('c.id','=',$cliente->id)
            ->first();
//        dd($clienteedit);
        $user = User::find($clienteedit->id_user)->roles->pluck('name');
//        dd($clienteedit);
        return view('cliente.show',['roles' => Role::all(), 'cliente' => $clienteedit, 'role' => $user[0]]);
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
            ->select('c.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.provincia','c.localidad','c.calleynumero','c.codigopostal','c.cuit','c.logoempresa')
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
        if ($request->get('role') == 'admin') {
            User::find($cliente->user_id)
                ->update([
                    'name' => $request->get('username'),
                    'email' => $request->get('mail'),
                    'email_verified_at' => now(),
                ]);

            Cliente::find($cliente->id)->update([
                'razon_social' => $request->get('razon_social'),
                'telefono' => $request->get('telefono'),
                'cuit' => $request->get('cuit'),
                'iva' => $request->get('iva'),
                'chasis' => $request->get('chasis'),
                'provincia' => $request->get('provincia'),
                'localidad' => $request->get('localidad'),
                'calleynumero' => $request->get('calleynumero'),
                'codigopostal' => $request->get('codigopostal'),
                'logoempresa' => $request->get('filepath'),

            ]);

            $clienteedit = DB::table('clientes as c')
                ->join('users as u', 'c.user_id', '=', 'u.id')
                ->select('u.id', 'c.razon_social', 'u.name as username', 'u.email as mail', 'c.telefono', 'u.id as id_user', 'c.iva', 'c.chasis', 'c.cuit','c.provincia','c.localidad','c.calleynumero','c.codigopostal','c.cuit','c.logoempresa')
                ->where('u.id', '=', 1)
                ->first();

            return view('admin.edit', ['cliente' => $clienteedit]);
        }

        User::find($cliente->user_id)
                    ->update([
                        'name' => $request->get('username'),
                        'email' => $request->get('mail'),
                        'email_verified_at' => now(),
//                        'password' => bcrypt($request->get('username')), // secret
//                        'remember_token' => str_random(10),
                            ]);
        $user = User::find($cliente->user_id);
        $userrolebefore = User::find($user->id)->roles->pluck('name');

        $user->removeRole($userrolebefore[0]);
        $user->assignRole($request->get('role'));

        Cliente::find($cliente->id)->update([
            'razon_social' => $request->get('razon_social'),
            'telefono' => $request->get('telefono'),
            'cuit' => $request->get('cuit'),
            'iva' => $request->get('iva'),
            'chasis' => $request->get('chasis'),
            'provincia' => $request->get('provincia'),
            'localidad' => $request->get('localidad'),
            'calleynumero' => $request->get('calleynumero'),
            'codigopostal' => $request->get('codigopostal'),
            'logoempresa' => $request->get('filepath'),
        ]);

        $clienteedit = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('c.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.cuit','c.provincia','c.localidad','c.calleynumero','c.codigopostal','c.cuit','c.logoempresa')
            ->where('c.id','=',$cliente->id)
            ->first();

        $user = User::find($clienteedit->id_user)->roles->pluck('name');

        if($userrolebefore[0]=='cliente_sin_categorizar'){
            if($request->get('role') == 'cliente_mayorista' || $request->get('role') == 'cliente_minorista'){
                $comment = 'El cliente fue Activado. Ya puede ver los precios de los repuestos.';
                $toEmail = $clienteedit->mail;
                Mail::to($toEmail)->send(new AcceptMail($comment));
            }
        }


        return view('cliente.show',['roles' => Role::all(), 'cliente' => $clienteedit, 'role' => $user[0]]);
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

    public function modificarAdmin()
    {
        $clienteedit = DB::table('clientes as c')
            ->join('users as u','c.user_id','=','u.id')
            ->select('u.id','c.razon_social','u.name as username','u.email as mail','c.telefono','u.id as id_user', 'c.iva', 'c.chasis','c.provincia','c.localidad','c.calleynumero','c.codigopostal','c.cuit','c.logoempresa')
            ->where('u.id','=',1)
            ->first();

//        dd($clienteedit);

        return view('admin.edit',['cliente' => $clienteedit]);
    }
}
