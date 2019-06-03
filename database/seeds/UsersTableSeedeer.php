<?php

use App\User;
use App\Cliente;
use Illuminate\Database\Seeder;

class UsersTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(User::class, 5)->create()->each(function($u) {
//            if ($u->id == 1) {
//                $u->assignRole('admin');
//            } else {
//                $u->assignRole('cliente_minorista');
//            }
//        });
        factory(User::class, 4)->create()->each(function($u) {
//            echo $u;
            switch ($u->id) {

                case 1:
                    $u->assignRole('admin');
                    $u->name = 'Norberto';
                    $u->email = 'admin@admin.com';
                    $cliente = new Cliente();
                    $cliente->user_id = $u->id;
                    $cliente->telefono = "1111111";
                    $cliente->razon_social = "Aya SA";
                    $cliente->provincia = "Santa Fe";
                    $cliente->localidad = "Capital";
                    $cliente->calleynumero = "Lavalle 3676";
                    $cliente->codigopostal = '3000';
                    $cliente->iva = "Inscripto";
                    $cliente->logoempresa = "/images/toyoterlogo-presupuesto.png";
                    $cliente->chasis = "3G1J85CC2GS999589";
                    $cliente->cuit = "20342475806";
                    $cliente->save();
                    $u->save();
                    break;

                case 2:
                    $u->assignRole('cliente_minorista');
                    $u->name = 'Daniela';
                    $u->email = 'cliente@minorista.com';
                    $cliente = new Cliente();
                    $cliente->user_id = $u->id;
                    $cliente->telefono = "444444";
                    $cliente->razon_social = "Aya SA";
                    $cliente->provincia = "Santa Fe";
                    $cliente->localidad = "Capital";
                    $cliente->calleynumero = "Lavalle 3676";
                    $cliente->codigopostal = '3000';
                    $cliente->iva = "Inscripto";
                    $cliente->chasis = "3G1J85CC2GS999589";
                    $cliente->cuit = "20342475806";
                    $cliente->save();
                    $u->save();
                    break;

                case 3:
                    $u->assignRole('cliente_mayorista');
                    $u->name = 'Alejandro';
                    $u->email = 'alejandrocolautti@gmail.com';
                    $cliente = new Cliente();
                    $cliente->user_id = $u->id;
                    $cliente->telefono = "444444";
                    $cliente->razon_social = "Aya SA";
                    $cliente->provincia = "Santa Fe";
                    $cliente->localidad = "Capital";
                    $cliente->calleynumero = "Lavalle 3676";
                    $cliente->codigopostal = '3000';
                    $cliente->iva = "Inscripto";
                    $cliente->chasis = "3G1J85CC2GS999589";
                    $cliente->logoempresa = "/images/logo.jpg";
                    $cliente->cuit = "20342475806";
                    $cliente->save();
                    $u->save();
                    break;

                case 4:
                    $u->assignRole('cliente_personalizado');
                    $u->name = 'Maxi';
                    $u->email = 'cliente@personalizado.com';
                    $cliente = new Cliente();
                    $cliente->user_id = $u->id;
                    $cliente->telefono = "444444";
                    $cliente->razon_social = "Aya SA";
                    $cliente->iva = "Inscripto";
                    $cliente->provincia = "Santa Fe";
                    $cliente->localidad = "Capital";
                    $cliente->calleynumero = "Lavalle 3676";
                    $cliente->codigopostal = '3000';
                    $cliente->chasis = "3G1J85CC2GS999589";
                    $cliente->cuit = "20342475806";
                    $cliente->save();
                    $u->save();
                    break;

            }
        });
    }
}
