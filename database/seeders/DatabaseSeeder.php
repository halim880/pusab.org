<?php

namespace Database\Seeders;

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
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            // MembersTableSeeder::class,
            // ExamsTableSeeder::class,
            // SchoolsTableSeeder::class,
            // CentersTableSeeder::class,
            // ApplicantsTableSeeder::class,
            // SliderImagesTableSeeder::class,
            // NoticesTableSeeder::class,
            // AdvisorsTableSeeder::class,
            // ActivitySeeder::class,
        ]);
    }
}
