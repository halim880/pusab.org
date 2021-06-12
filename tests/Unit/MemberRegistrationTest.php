<?php

namespace Tests\Unit;

use App\Models\Member;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberRegistrationTest extends TestCase
{
    use DatabaseMigrations;

    public function test_member_can_be_store_to_the_database(){
        Member::create([
            'user_id'=> 1,
            'father_name'=> 'Enayet Ullah',
            'mother_name'=> 'Kulsuma Khatun',
            'institution'=> 'Sylhet Engineering College',
            'department'=> 'Echonomics',
            'session'=> '2015-2016',
            'college'=> 'Modon Mohan College, Sylhet',
            'high_school'=> 'HMP High School, Sunamgonj',
            'blood_group'=> 'A+',
            'village'=>'Kachir Gati',
            'post_office'=>'Polash',
            'union'=>'Polash',
            'current_address'=> 'Maktab goli, Chittagong',
            'phone'=> '01714 870178',
            'image'=> 'image.jpg',
        ]);

        $this->assertTrue(Member::all()->count()==1);
    }
}
