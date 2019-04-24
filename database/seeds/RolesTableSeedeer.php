<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('ver_precio_sugerido','ver_precio_minorista', 'ver_precio_mayorista', 'ver_precio_personalizado');
//        $role->givePermissionTo('ver_precio');
        $role1 = Role::create(['name' => 'cliente_minorista']);
        $role2 = Role::create(['name' => 'cliente_mayorista']);
        $role3 = Role::create(['name' => 'cliente_personalizado']);
        $role4 = Role::create(['name' => 'cliente_sin_categorizar']);

        $role1->givePermissionTo('ver_precio_minorista');
        $role2->givePermissionTo('ver_precio_mayorista');
        $role3->givePermissionTo('ver_precio_personalizado');
    }
}
