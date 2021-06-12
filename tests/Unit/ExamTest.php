<?php

namespace Tests\Unit;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;

class ExamTest extends TestCase
{
    use DatabaseMigrations;

    public function test_exam_can_be_created(){
        Exam::create($this->data());

        $exam = Exam::first();

        $this->assertEquals($exam->name, 'Pusap Meda britti, 2021');
    }

    public function test_exam_can_be_deleted(){
        Exam::create($this->data());

        $exam = Exam::first();
        $this->assertNotNull($exam);
        $exam->delete();
        $exam = Exam::first();
        $this->assertNull($exam);
    }

    public function test_exam_can_be_updated(){
        Exam::create($this->data());

        $exam = Exam::first();

        $exam->update([
            'name'=> 'PUSAB MEDHA BRITTI, 2020',
        ]);
        $exam = Exam::first();
        $this->assertEquals($exam->name, 'PUSAB MEDHA BRITTI, 2020');
    }

    private function data(){
        return [
            'name'=> 'Pusap Meda britti, 2021',
            'date'=> Carbon::now(),
        ];
    }
}
