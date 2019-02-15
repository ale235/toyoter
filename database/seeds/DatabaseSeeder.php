<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);1
        $this->call(PermissionsTableSeedeer::class);
        $this->call(RolesTableSeedeer::class);
        $this->call(UsersTableSeedeer::class);

    }
}
