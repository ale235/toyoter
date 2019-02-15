<?php

use App\User;
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
                    echo $u;
                    $u->assignRole('admin');
                    $u->name = 'Alejandro';
                    $u->email = 'admin@admin.com';
                    $u->save();
                    break;

                case 2:
                    $u->assignRole('cliente_minorista');
                    $u->name = 'Daniela';
                    $u->email = 'cliente@minorista.com';
                    $u->save();
                    break;

                case 3:
                    $u->assignRole('cliente_mayorista');
                    $u->name = 'Norberto';
                    $u->email = 'cliente@mayorista.com';
                    $u->save();
                    break;

                case 4:
                    $u->assignRole('cliente_personalizado');
                    $u->name = 'Maxi';
                    $u->email = 'cliente@personalizado.com';
                    $u->save();
                    break;

            }
            if ($u->id == 1) {
            } else {
                $u->assignRole('cliente_minorista');
            }
        });
//        factory(Post::class, 8)->create(['user_id'=>1]);
    }
}
