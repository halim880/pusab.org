<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = User::create([
            'name'=> 'Admin',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('password'),
        ]);
        $user->assignRole('admin');
    }
}
