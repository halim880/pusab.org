<?php

namespace Tests\Unit;

use App\Models\Advisor;
use App\Models\Member;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdvisorSignupTest extends TestCase
{
    use DatabaseMigrations;

    public function test_advisor_can_be_store_to_the_database(){
        Advisor::create([
            'user_id'=> 1,
            'profession'=> 'Doctor',
            'institution'=> 'Shahjalal university',
            'department'=> 'Computer Science & Engineering',
            'passing_year'=> 1999,
            'job_title'=> 'Lecturer (Bangla)',
            'job_location'=> 'Digendra Barman Degree college',
            'phone'=> '01743920880',
            'image'=> 'image.jpg',
        ]);

        $this->assertTrue(Advisor::all()->count()==1);
    }
}
