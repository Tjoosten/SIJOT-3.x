<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'lease']);
        Role::create(['name' => 'active']);
        Role::create(['name' => 'blocked']);
        Role::create(['name' => 'users']);
    }
}
