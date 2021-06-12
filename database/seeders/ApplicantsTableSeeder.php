<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = glob(Applicant::getImageDirectory().'/*');
        foreach($images as $image){
            if (file_exists($image)) {
                    unlink($image);
            }
        }
        Applicant::truncate();
        Applicant::factory(20)->create();
    }
}
