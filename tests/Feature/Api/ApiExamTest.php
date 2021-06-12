<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiExamTest extends TestCase
{
    use DatabaseMigrations;
    
    public function test_exam_can_be_stored(){
        $this->withoutExceptionHandling();
        $this->post('api/scholarship/exams', $this->data())->assertCreated();
        $exam = Exam::first();

        $this->assertEquals($exam->name, 'Pusap Meda britti');
        $this->assertEquals($exam->name, 'Pusap Meda britti');
    }

    public function test_exam_can_be_deleted(){
        $this->withoutExceptionHandling();

        Exam::create($this->data());

        $exam = Exam::first();
        $this->assertNotNull($exam);
        $this->delete('api/scholarship/exams/'.$exam->id);
        $exam = Exam::first();
        $this->assertNull($exam);
    }

    public function test_exam_can_be_updated(){
        $this->withoutExceptionHandling();
        Exam::create($this->data());

        $exam = Exam::first();

        $this->put('api/scholarship/exams/'.$exam->id, $this->data([
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
