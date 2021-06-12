<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Seeder;

class CentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Center::truncate();
        Center::factory(3)->create();
    }
}
