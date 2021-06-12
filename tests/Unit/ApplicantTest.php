<?php

namespace Tests\Unit;

use App\Models\Applicant;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ApplicantTest extends TestCase
{
    use DatabaseMigrations;
    public function test_applicant_details_can_showed(){
        $this->withoutExceptionHandling();
        
        Applicant::create($this->data());

        $applicant = Applicant::first();

        $this->assertEquals($applicant->name, 'Shohidullah Kaisar');
        $this->assertEquals($applicant->father_name, 'Enayet Ullah');
        $this->assertEquals($applicant->mother_name, 'Kulsuma Khatun');
    }

    private function data($merge = []){
        return array_merge(
            [
                'name'=> 'Shohidullah Kaisar',
                'father_name'=> 'Enayet Ullah',
                'mother_name'=> 'Kulsuma Khatun',
                'school_id'=> 1,
                'exam_id'=> 1,
                'class'=> 10,
                'village'=>'Kachir Gati',
                'post_office'=>'Polash',
                'union'=>'Polash',
                'current_address'=> 'Maktab goli, Chittagong',
                'phone'=> '01714 870178',
                'image'=> 'image.jpg',
            ],
            $merge
        );
    }
}
