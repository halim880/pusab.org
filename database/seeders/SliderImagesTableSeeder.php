<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider_images')->truncate();
        $images = ['01', '02', '03', '04', '05', '06', '07'];
        foreach ($images as $image) {
            DB::table('slider_images')->insert(['image'=>$image.'.jpg']);
        }
    }
}
