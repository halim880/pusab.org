<?php

namespace Tests\Feature;

use App\Models\Exam;
use App\Models\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Tests\Traits\Admin;
use Tests\Traits\RequestData;

class ApplicationRequestValidationTest extends TestCase
{
    use RequestData;
    use DatabaseMigrations, Admin;

    public function setUp():void{
        parent::setUp();
        $exam = Exam::factory()->make();
        $exam->is_ongoing = 1;
        $exam->save();
        $this->school_id = School::factory()->create()->id;
        $this->exam_id = $exam->id;
    }

    public function test_name_is_required(){
        $this->postRequest('name', '');
    }

    public function test_father_name_is_required(){
        $this->postRequest('father_name', '');
    }
    public function test_mother_name_is_required(){
        $this->postRequest('mother_name', '');
    }
    public function test_school_id_is_required(){
        $this->postRequest('school_id', '');
    }
    public function test_exam_id_is_required(){
        $this->postRequest('exam_id', '');
    }
    public function test_class_is_required(){
        $this->postRequest('class', '');
    }
    public function test_class_must_be_between_eight_and_ten(){
        $this->postRequest('class', 12);
        $this->postRequest('class', 7);
    }
    public function test_village_is_required(){
        $this->postRequest('village', '');
    }
    public function test_post_office_is_required(){
        $this->postRequest('post_office', '');
    }
    public function test_union_is_required(){
        $this->postRequest('union', '');
    }
    public function test_current_address_is_required(){
        $this->postRequest('current_address', '');
    }
    public function test_phone_is_required(){
        $this->postRequest('phone', '');
    }
    public function test_image_is_required(){
        $this->postRequest('phone', '');
    }
    public function test_image_must_be_an_image(){
        $this->postRequest('image', 'not-image.jpg');
    }
    public function postRequest($field, $value){
        $this->post('application/submit', 
            $this->applicationData([$field => $value]))->assertSessionHasErrors([$field]);
    }
}
