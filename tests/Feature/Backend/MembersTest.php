<?php

namespace Tests\Feature\Backend;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Tests\Traits\Admin;

class MembersTest extends TestCase
{
    use DatabaseMigrations, Admin;

    public function test_member_details_can_showed(){
        $this->withoutExceptionHandling();
        
        $this->postStoreMember();

        $member = Member::first();

        $response = $this->actingAs($this->admin())->get($member->url);
        $response->assertSee($member->name);
        $response->assertSee($member->email);
        $response->assertSee($member->institute);
        $response->assertSee($member->department);
    }

    public function test_member_edit_page_can_be_rendered(){
        $this->withoutExceptionHandling();

        $this->postStoreMember();

        $member = Member::first();

        $response = $this->actingAs($this->admin())->get($member->edit_url);
        $response->assertOk();
    }

    public function test_member_can_be_updated(){
        $this->withoutExceptionHandling();

        $this->postStoreMember();
        $member = Member::first();

        $response = $this->actingAs($this->admin())->put($member->url, 
            $this->data([
                'name'=> 'Abdul Halim'
            ])
        );
        $response->assertStatus(302);
        
        $member = Member::first();

        $this->assertEquals($member->name, 'Abdul Halim');
    }

    private function postStoreMember(){
        
        return $this->post('member/register', $this->data());
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