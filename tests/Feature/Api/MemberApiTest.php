<?php

namespace Tests\Feature\Api;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class MemberApiTest extends TestCase
{
    use DatabaseMigrations;

    public function test_member_details_can_be_registered(){
        $this->withoutExceptionHandling();
        
        $this->postStoreMember()->assertStatus(201);
        $member = Member::first();
        $user = User::first();

        $this->assertFileExists(Member::getImageDirectory().'/'.$member->image);
        $this->assertEquals($member->name, $user->name);
        $this->assertEquals($member->email, $user->email);
        @unlink(Member::getImageDirectory().'/'.$member->image);
        $this->assertFileDoesNotExist(Member::getImageDirectory().'/'.$member->image);
    }


    public function test_member_can_be_updated(){
        $this->withoutExceptionHandling();

        $this->postStoreMember();
        $member = Member::first();

        $response = $this->put('api/backend/members/'.$member->id, 
            $this->data([
                'name'=> 'Abdul Halim'
            ])
        );
        $response->assertOk();
        $member = Member::first();
        $this->assertEquals($member->name, 'Abdul Halim');
    }

    private function postStoreMember(){
        return $this->post('api/backend/members', $this->data());
    }

    private function data($merge = []){
        return array_merge(
            [
                'name'=> 'Shohidullah Kaisar',
                'email'=> 'a.halimics@gmail.com',
                'password'=> 'password',
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
                'image'=> UploadedFile::fake()->image('random.jpeg'),
            ],
            $merge
        );
    }
}
