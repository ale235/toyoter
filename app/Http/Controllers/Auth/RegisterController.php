<?php

namespace App\Http\Controllers\Auth;

use App\Cliente;
use App\Mail\AcceptMail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'provincia' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
        ]);

        Cliente::create([
            'user_id' => $user->id,
            'razon_social' => $data['nombreapellidorazonsocial'],
            'iva' => $data['condicioniva'],
            'provincia' => $data['provincia'],
            'localidad' => $data['localidad'],
            'calleynumero' => $data['calleynumero'],
            'codigopostal' => $data['codigopostal'],
            'cuit' => $data['cuit'],
            'telefono' => $data['telefono'],
            'chasis' => "Sin Descripción",
            'logoempresa' => "/images/blank.jpg",
        ]);

        $user->assignRole('cliente_sin_categorizar');

//        $table->string('razon_social');
//        $table->string('telefono');
//        $table->string('cuit');
//        $table->string('iva');
//        $table->string('domicilio');
//        $table->string('chasis');

        $comment = 'El cliente '.Cliente::where('user_id','=',$user->id)->first()->razon_social.' fue Activado. Ya puede ver los precios de los repuestos y completar los datos faltantes del formulario.';
//        $toEmail = 'alejandrocolautti@gmail.com';
        Mail::to($user->email)->send(new AcceptMail($comment));

        return $user;
    }
}
