<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::truncate();

        School::create([
            'name'=> 'Ratar Gaon High school',
            'union'=> 'solokabad',
        ]);
        School::create([
            'name'=> 'Polash high school',
            'union'=> 'polash',
        ]);
        School::factory(10)->create();
    }
}
