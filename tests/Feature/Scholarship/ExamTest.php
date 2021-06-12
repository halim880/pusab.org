<?php

namespace Tests\Feature\Scholarship;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\Admin;

class ExamTest extends TestCase
{
    use DatabaseMigrations, Admin;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function test_scholarship_exam_index_page_can_be_rendered(){
        $response = $this->actingAs($this->admin())->get(Exam::indexUrl());
        $response->assertOk();
        $response->assertViewIs(Exam::indexView());
    }

    public function test_scholarship_exam_create_form_can_be_rendered(){
        $response = $this->actingAs($this->admin())->get(Exam::createUrl());
        $response->assertOk();
        $response->assertViewIs(Exam::createView());
    }

    public function test_exam_can_be_stored(){
        $response = $this->actingAs($this->admin())->post(Exam::storeUrl(), $this->data());
        $response->assertRedirect(Exam::indexUrl());
        $exam = Exam::first();

        $this->assertEquals($exam->name, 'Pusap Meda britti');
    }

    public function test_exam_can_be_deleted(){

        Exam::create($this->data());
        $exam = Exam::first();

        $this->assertNotNull($exam);
        $response = $this->actingAs($this->admin())->delete($exam->url);
        $response->assertRedirect(Exam::indexUrl());
        $this->assertNull(Exam::find($exam->id));
    }

    public function test_exam_edit_page_can_be_shown(){

        $exam = Exam::create($this->data());
        $response = $this->actingAs($this->admin())->get($exam->edit_url);
        $response->assertOk();
        $response->assertViewIs($exam->edit);
        $response->assertViewHas([
            'exam'=> $exam,
        ]);
    }

    public function test_exam_show_page_can_be_rendered(){

        $exam = Exam::create($this->data());
        $response = $this->actingAs($this->admin())->get($exam->url);
        $response->assertOk();
        $response->assertViewIs($exam->show);
        $response->assertViewHas([
            'exam'=> $exam,
        ]);
    }

    public function test_exam_can_be_updated(){
        Exam::create($this->data());

        $exam = Exam::first();

        $this->actingAs($this->admin())->put($exam->url, $this->data([
            'name'=> 'Pusap Meda britti, 2020',
        ]));

        $exam = Exam::first();
        $this->assertEquals($exam->name, 'Pusap Meda britti, 2020');
    }

    private function data($update = []){
        return array_merge([
            'name'=> 'Pusap Meda britti',
            'date'=> Carbon::now(),
        ], $update);
    }
}
