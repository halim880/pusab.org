<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create([
            'name'=> 'super_admin',
        ]);
        Role::create([
            'name'=> 'admin',
        ]);
        Role::create([
            'name'=> 'executive',
        ]);
        Role::create([
            'name'=> 'member',
        ]);
        Role::create([
            'name'=> 'advisor',
        ]);
    }
}
