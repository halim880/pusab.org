<?php

namespace Tests\Feature\Scholarship;

use App\Models\Applicant;
use App\Models\Exam;
use App\Models\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Tests\Traits\RequestData;

class ApplicationTest extends TestCase
{
    use DatabaseMigrations, RequestData;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
        $exam = Exam::factory()->make();
        $exam->is_ongoing = 1;
        $exam->save();

        $this->school_id = School::factory()->create()->id;
        $this->exam_id = $exam->id;
    }

    public function test_application_form_can_be_rendered(){
        $exam = Exam::factory()->create();
        $response = $this->get('application/form/'.$this->exam_id);
        $response->assertStatus(200);
        $response->assertViewIs('scholarship.application.create');
        $response->assertViewHas('examId');
    }

    public function test_applicant_can_be_saved(){

        $this->post('application/submit', $this->ApplicationData());
        $applicant = Applicant::first();

        $this->assertEquals($applicant->name, 'Shohidullah Kaisar');
        $this->assertEquals($applicant->father_name, 'Enayet Ullah');
        $this->assertEquals($applicant->mother_name, 'Kulsuma Khatun');
        
        $this->deleteImage($applicant);
    }


    private function deleteImage($applicant): void{
        $this->assertFileExists(Applicant::getImageDirectory().'/'.$applicant->image);
        $applicant->removeImage();
        $this->assertFileDoesNotExist(Applicant::getImageDirectory().'/'.$applicant->image);
    }
}
