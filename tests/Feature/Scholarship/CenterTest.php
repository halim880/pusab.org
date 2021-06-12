<?php

namespace Tests\Feature\Scholarship;

use App\Models\Center;
use App\Models\Exam;
use App\Models\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\Admin;

class CenterTest extends TestCase
{
    use DatabaseMigrations, Admin;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();

        $exam = Exam::factory()->make();
        $exam->is_ongoing = 1;
        $exam->save();
    }

    public function test_center_create_form_can_be_rendered(){
        $response = $this->actingAs($this->admin())->get('scholarship/centers/create');
        $response->assertOk();
        $response->assertViewIs('scholarship.center.create');
    }

    public function test_center_can_be_stored(){
        $response = $this->actingAs($this->admin())->post(Center::storeUrl(), $this->data());
        $center = Center::first();
        $this->assertNotNull($center);
        $response->assertRedirect('scholarship/exams/'.$center->exam_id);
    }

    public function test_center_can_be_deleted(){

        $this->createcenter();
        
        $this->assertNotNull(Center::first());
        
        $center = Center::first();

        $response = $this->actingAs($this->admin())->delete($center->url);
        $this->assertNull(Center::first());
        $response->assertRedirect(Center::indexUrl());
    }

    public function test_center_can_be_updated(){

        $center = $this->createcenter();
        $this->assertNotNull($center);

        $response = $this->actingAs($this->admin())->put($center->url, $this->data([
            'name'=> 'Mission highschool',
        ]));

        $center = Center::find($center->id);
        $this->assertEquals($center->name, 'Mission highschool');
        $response->assertRedirect($center->url);
    }

    private function createcenter(){
        return Center::create($this->data());
    }

    private function data($update=[]){
        return array_merge([
            'exam_id'=> 1,
            'name'=> 'Ratar gaon high school',
            'address'=> 'Ratar goan, Bisswambharpur, Sunamgonj'
        ], $update);
    }
}
