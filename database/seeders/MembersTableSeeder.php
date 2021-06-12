<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = glob(Member::getImageDirectory().'/*');
        foreach($images as $image){
            if (file_exists($image)) {
                    unlink($image);
            }
        }
        Member::truncate();

        Member::factory(10)->create();
    }
}
