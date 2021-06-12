<?php

namespace Database\Seeders;

use App\Models\Advisor;
use Illuminate\Database\Seeder;

class AdvisorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = glob(Advisor::getImageDirectory().'/*');
        foreach($images as $image){
            if (file_exists($image)) {
                    unlink($image);
            }
        }
        Advisor::truncate();
        Advisor::factory(10)->create();
    }
}
