<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'ver_precio_sugerido']);
        Permission::create(['name' => 'ver_precio_minorista']);
        Permission::create(['name' => 'ver_precio_mayorista']);
        Permission::create(['name' => 'ver_precio_taller']);
    }
}
