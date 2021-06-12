<?php

namespace Tests\Feature\Scholarship;

use App\Models\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\Admin;

class SchoolTest extends TestCase
{
    use DatabaseMigrations, Admin;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function test_school_index_page_can_be_rendered(){
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->admin())->get(School::BASE_URL);
        $response->assertOk();
        $response->assertViewIs(School::indexView());
    }

    public function test_school__create_create_can_be_rendered(){
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->admin())->get(School::createUrl());
        $response->assertOk();
        $response->assertViewIs(School::createView());
    }
    public function test_school_can_be_created(){
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->admin())->post(School::BASE_URL, $this->data());

        $this->assertNotNull(School::first());
        $response->assertRedirect(School::BASE_URL);
    }

    public function test_applicants_details_can_be_shown(){
        $this->withoutExceptionHandling();

        $this->createSchool();

        $applicant = School::first();
        $response = $this->actingAs($this->admin())->get($applicant->url);
        $response->assertOk();
        $response->assertViewIs(School::showView());
    }

    public function test_school_can_be_deleted(){
        $this->withoutExceptionHandling();

        $this->createSchool();
        
        $this->assertNotNull(School::first());
        
        $school = School::first();

        $response = $this->actingAs($this->admin())->delete($school->url);
        $this->assertNull(School::first());
        $response->assertRedirect(School::BASE_URL);
    }

    public function test_school_edit_page_can_be_shown(){
        $this->withoutExceptionHandling();

        $this->createSchool();

        $school = School::first();
        $response = $this->actingAs($this->admin())->get($school->edit_url);
        $response->assertOk();
        $response->assertViewIs($school->edit);
        $response->assertViewHas([
            'school'=> $school,
        ]);
    }

    public function test_school_can_be_updated(){
        $this->withoutExceptionHandling();

        $school = $this->createSchool();
        $this->assertNotNull($school);

        $response = $this->actingAs($this->admin())->put($school->url, $this->data([
            'name'=> 'Mission highschool',
        ]));

        $school = School::first();
        $this->assertEquals($school->name, 'Mission highschool');
        $response->assertRedirect($school->url);
    }

    private function createSchool(){
        return School::create($this->data());
    }

    private function data($update=[]){
        return array_merge([
            'name'=> 'Ratar gaon high school',
            'union'=> 'Soluka bad',
        ], $update);
    }
}
